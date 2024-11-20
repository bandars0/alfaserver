<?php

namespace App\Filament\Resources;

use App\Filament\Resources\templateResource\Pages;
use App\Models\template;
use App\View\Components\DefaultTemplate;
use Dotswan\FilamentCodeEditor\Fields\CodeEditor;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\View\View;

class templateResource extends Resource
{
    protected static ?string $model = template::class;

    protected static ?string $slug = 'templates';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                    ->required(),

                Textarea::make('description'),
                KeyValue::make('fields')->label('Fields')->columns(3),
                CodeEditor::make('view')->required()
                    // Additional configuration goes here, if needed
                    ->id('view_code')
                    ->minHeight(768)

                    ->darkModeTheme('gruvbox-dark')
                    ->lightModeTheme('basic-light')
                    ->default(self::getDefaultTemplate())
                    ->columnSpanFull(),
                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?template $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?template $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function getDefaultTemplate()
    {
        return view('components.default-tempalte')->render();
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description'),

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\Listtemplates::route('/'),
            'create' => Pages\Createtemplate::route('/create'),
            'edit' => Pages\Edittemplate::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
