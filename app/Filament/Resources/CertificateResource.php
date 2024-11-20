<?php

namespace App\Filament\Resources;

use App\Enum\CertificateStatus;
use App\Filament\Resources\CertificateResource\Pages;
use App\Jobs\CertificateQrCodeJob;
use App\Jobs\GeneratePDF;
use App\Models\Certificate;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $slug = 'certificates';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $activeNavigationIcon = 'heroicon-s-academic-cap';

    public static function getLabel(): ?string
    {

        return __('admin.certificates');
    }

    public static function getModelLabel(): string
    {
        return __('admin.certificate');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.certificates');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->columns(2)
                    ->heading('Certificate Details')
                    ->schema([
                        TextInput::make('number'),

                        Select::make('status')->options(CertificateStatus::getAll())->default(CertificateStatus::PENDING),

                        TextInput::make('user_id')->before(function ($data) {
                            $data['user_id'] = auth()->id();
                        })->default(Auth::id())->hidden(),
                        TextInput::make('certificate_url')->readOnly()
                            ->formatStateUsing(function ($record) {
                                return asset(Storage::url($record->certificate_file));
                            })->prefix('open')
                            ->prefixAction(function (\Filament\Forms\Components\Actions\Action $action, $record) {
                                return $action::make('open_urls')->icon('heroicon-o-link')->url(asset(Storage::url($record->certificate_file)), true);
                            })
                            ->url(),
                        TextInput::make('full_name'),
                        DatePicker::make('issue_date')->native(false),
                        DatePicker::make('expired_date')->native(false),

                        Placeholder::make('created_at')
                            ->label('Created Date')
                            ->content(fn(?Certificate $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                        Placeholder::make('updated_at')
                            ->label('Last Modified Date')
                            ->content(fn(?Certificate $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                    ]),

                Section::make()->columns(3)
                    ->heading('Certificate Files')
                    ->schema([
                        FileUpload::make('qr_code')->image()->directory('qr_codes')->openable()->previewable()->downloadable(),
                        FileUpload::make('certificate_file')->openable()->previewable()->downloadable()->directory('certificates'),
                        FileUpload::make('additional_files')->multiple(),
                    ]),
                Section::make()->columns(2)
                    ->statePath('certificate_data')
                    ->heading('Full Certificate Information')
                    ->schema([
                        TextInput::make('sn')->numeric(),
                        TextInput::make('ref'),
                        TextInput::make('diff'),
                        TextInput::make('result'),
                        TextInput::make('cal_due')->label('Expected Date'),
                        TextInput::make('lab_dev'),
                        TextInput::make('cal_date'),
                        TextInput::make('cal_due_'),
                        Textarea::make('comments'),
                        TextInput::make('Issued_to'),
                        TextInput::make('date_of_issue')->label('Issue Date'),
                        TextInput::make('instrument_id')->label('Instrument ID'),
                        TextInput::make('serial_number')->label('Serial Number'),
                        TextInput::make('instrument_type')->label('Instrument Type'),
                        TextInput::make('certificate_number')->label('Certificate Number'),
                        TextInput::make('instrument_manufacturer')->label('Instrument Manufacturer'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->columns([
                TextColumn::make('number')->searchable()->badge()->copyable()->toggleable()->sortable()->label(__('admin.number')),
                TextColumn::make('certificate_data.Issued_to')->searchable()->toggleable()->sortable()->label(__('Issued To')),
                TextColumn::make('expired_date')->searchable()->toggleable()->sortable()
                    ->date(),
                TextColumn::make('issue_date')->searchable()->toggleable()->sortable()
                    ->date(),
                ImageColumn::make('qr_code')->searchable()->toggleable()->sortable(),
                TextColumn::make('status')->badge()->searchable()->toggleable()->sortable()->color(function (Certificate $record) {
                    return CertificateStatus::getColor($record->status);
                }),
//                TextColumn::make('certificate_url')->searchable()->toggleable()->sortable(),
                TextColumn::make('created_at')->searchable()->toggleable()->sortable()->label(__('Created At')),
                TextColumn::make('updated_at')->searchable()->toggleable()->sortable()->label(__('Updated At')),
            ])
            ->filters([
                SelectFilter::make('status')->options(CertificateStatus::getAll()),
            ])
            ->actions([
                EditAction::make()->slideOver(),
                DeleteAction::make(),
                Action::make('validate_certificate')
                    ->button()
                    ->icon('heroicon-o-check-circle')
                    ->label('Validate')
                    ->tooltip('Validate Certificate')->hidden(function (Certificate $record) {
                        return $record->status != CertificateStatus::PENDING && $record->certificate_url == null;
                    })
                    ->url(function (Certificate $record) {
                        return route('certificate.validate', $record->hash);
                    })->openUrlInNewTab()->color('success'),
                Action::make('download_certificate')
                    ->button()->hidden(function (Certificate $record) {
                        return !$record->certificate_file;
                    })
                    ->action(function (Certificate $record) {

                        if (!$record->certificate_file) {
                            Notification::make('certificate_file_not_found')->title('Certificate file not found.')->warning()->send();
                        }

                        $url = Storage::disk('public')->path($record->certificate_file); // Assuming you have a 'pdf_url' field in your record
                        return response()->download($url);

                    })
                    ->icon('heroicon-o-arrow-down-on-square-stack')->hiddenLabel()
                    ->tooltip('Download Certificate')->color('success'),
                Action::make('createQrCode')
                    ->button()
                    ->icon('heroicon-o-arrow-path')
                    ->label('QR Code')
                    ->tooltip('Generate QR Code')
                    ->hiddenLabel()
                    ->action(function (Certificate $record) {
                        try {
                            $record->generateQrCode();
                            Notification::make('qr_code_generated')->title('QR code generated.')->success()->send();
                        } catch (Exception $exception) {
                            Notification::make('Something went wrong.')->warning()->send();
                        }
                    })->outlined()
                    ->color('warning'),
                Action::make('generate_certificate')
                    ->icon('heroicon-o-document-chart-bar')
                    ->tooltip('Generate Certificate')
                    ->hiddenLabel()
                    ->outlined()
                    ->button()
                    ->action(function (Certificate $record) {
                        try {
                            CertificateQrCodeJob::dispatch($record->id);
                            GeneratePDF::dispatch($record->id);
                            Notification::make('generate_certificate_noti')->title('Certificated Generate Process')->success()->send();
                        } catch (Exception $exception) {
                            Notification::make('Something went wrong.')->warning()->send();
                        }
                    })
                    ->color('warning'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('generate_qr_code')
                        ->icon('heroicon-o-arrow-path')
                        ->label('Generate QR Codes')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->generateQrCode();
                            }
                        })
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
//            'create' => Pages\CreateCertificate::route('/create'),
//            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
