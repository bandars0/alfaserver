<?php

namespace App\Filament\Pages;


use App\Settings\GeneralSettings;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class General extends SettingsPage
{
    use HasPageSidebar;
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $slug = 'settings/general';
    protected static string $settings = GeneralSettings::class;
    protected static ?string $navigationGroup ='Settings';
    protected ?string $maxContentWidth = 'full';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('copyright_text'),
//                Forms\Components\TextInput::make('copyright_url'),
                Forms\Components\TextInput::make('site_name'),
                Forms\Components\TextInput::make('company'),
                Forms\Components\TextInput::make('copyright'),
                Forms\Components\FileUpload::make('certificate_logo')->label('Certificate validation Logo'),
                Forms\Components\FileUpload::make('logo')->label('Admin Logo'),

            ]);
    }

    public static function sidebar(): FilamentPageSidebar
    {

        return FilamentPageSidebar::make()
            ->setTitle('Application Settings')
            ->setDescription('general, admin, website, sms, payments, notifications, shipping')
            ->setNavigationItems([
                PageNavigationItem::make()
                    ->label('General Settings')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->url(function () {
                        return self::getUrl();
                    })->isActiveWhen(function () {
                        return request()->routeIs(self::getRouteName());

                    })
                    ->activeIcon('heroicon-s-cog-6-tooth'),
                PageNavigationItem::make()
                    ->url(function () {
                        return PdfSettings::getUrl();
                    })
                    ->label('Pdf Settings')
                    ->translateLabel()
                    ->icon('heroicon-o-document')
                    ->activeIcon('heroicon-s-document')
                    ->isActiveWhen(function () {
                        return request()->routeIs(PdfSettings::getRouteName());
                    }),
            ]);
    }

}
