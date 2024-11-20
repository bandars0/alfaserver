<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BulkimportResource\Pages;
use App\Imports\CertificationsImport;
use App\Models\BulkImport;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BulkImportResource extends Resource
{
    protected static ?string $model = BulkImport::class;

    protected static ?string $slug = 'bulk-imports';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                FileUpload::make('file')->directory('bulk_imports')
                    ->required()->downloadable(),
                Textarea::make('description'),

                Select::make('template_id')
                    ->relationship('template', 'name')
                    ->required(),

                Select::make('status')->options([
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])->default('pending')->hiddenOn('edit'),

                Toggle::make('is_started')->hiddenOn('edit')
                    ->required(),
                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?BulkImport $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?BulkImport $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('file')
                    ->icon('heroicon-o-inbox-arrow-down')
                    ->tooltip('Download')
                    ->url(fn(BulkImport $record) => Storage::url($record->file))->size('sm')
                    ->openUrlInNewTab(true),

                TextColumn::make('description'),

                TextColumn::make('template.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_count')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('certifications_count')->counts('certifications')->label('Certifications'),

                TextColumn::make('status')->badge()->color(function (Model $record) {
                    if ($record->status == 'pending') {
                        return 'warning';
                    } elseif ($record->status == 'completed') {
                        return 'success';
                    } else {
                        return 'danger';
                    }
                }),

                IconColumn::make('is_started')->boolean(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make()->slideOver(),
                DeleteAction::make(),
                Action::make('queue')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->label('Run')
                    ->action(function (BulkImport $record) {
                        if ($record->status == 'completed') {
                            Notification::make()->title('Them importer is completed.')->warning()->send();
                            return;
                        }
                        try {
                            Excel::import(new CertificationsImport($record), $record->file, 'public');
                            Notification::make()->title('started queue for processing.')->success()->send();
                        } catch (Exception $exception) {
                            Notification::make()->title('started queue for processing.')->danger()->send();
                        }
                    }),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBulkimports::route('/'),
//            'create' => Pages\CreateBulkimport::route('/create'),
//            'edit' => Pages\EditBulkimport::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['template']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'template.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->template) {
            $details['Template'] = $record->template->name;
        }

        return $details;
    }
}
