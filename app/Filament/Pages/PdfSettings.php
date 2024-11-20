<?php

namespace App\Filament\Pages;

use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\SettingsPage;

class PdfSettings extends SettingsPage
{
    use HasPageSidebar;

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $slug = 'settings/pdf';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $settings = \App\Settings\PdfSettings::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('logo')->image()->preserveFilenames(),
            FileUpload::make('header')->image()->preserveFilenames()->helperText('Recommended size: 720x90px'),
            FileUpload::make('footer')->image()->preserveFilenames()->helperText('Recommended size: 720x90px'),
        ]);
    }

    public static function sidebar()
    {
        return \App\Filament\Pages\General::sidebar();
    }
}
