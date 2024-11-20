<?php

namespace App\Providers\Filament;

use App\Filament\Resources\BulkimportResource\Pages\ListBulkimports;
use App\Filament\Resources\CertificateResource;
use App\Filament\Resources\templateResource\Pages\Listtemplates;
use App\Filament\Resources\UserResource;
use App\Settings\GeneralSettings;
use Croustibat\FilamentJobsMonitor\FilamentJobsMonitorPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Kenepa\TranslationManager\TranslationManagerPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugin(TranslationManagerPlugin::make())
            ->plugin(FilamentJobsMonitorPlugin::make())
            ->plugin(\Hasnayeen\Themes\ThemesPlugin::make()->canViewThemesPage(function () {
                return true;
            }))
            ->maxContentWidth(MaxWidth::Full)
//            ->sidebarFullyCollapsibleOnDesktop(true)
//            ->sidebarCollapsibleOnDesktop(true)

            ->colors([
                'primary' => Color::Amber,
            ])->brandName(function () {
                $settings = $this->app->make(GeneralSettings::class);
                return $settings->site_name;
            })
            ->brandLogo(function () {
                $settings = $this->app->make(GeneralSettings::class);
                if (!empty($settings->logo)) {
                    return Storage::url($settings->logo);
                }
                return false;
            })
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \App\Filament\Pages\DashboardPage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->navigationGroups([
                'certificates',
                'users',
                'Settings',
            ])
            ->navigationItems([
                NavigationItem::make(CertificateResource::getLabel())
                    ->url(function () {
                        return CertificateResource\Pages\ListCertificates::getUrl();
                    })->isActiveWhen(function () {
                        return request()->routeIs('*.resources.certificates.index');
                    })->icon('heroicon-o-check-badge')
                    ->group('certificates'),

                NavigationItem::make('users')->group('users')->label('Users')
                    ->url(function () {
                        return UserResource::getUrl();
                    })->icon('heroicon-o-users'),
                NavigationItem::make('users_create')->group('users')->label('Create User')
                    ->url(function () {
                        return UserResource::getUrl('create');
                    })->icon('heroicon-o-user-plus'),
                NavigationItem::make(__('admin.bulk_import'))
                    ->icon('heroicon-o-arrow-up-on-square-stack')
                    ->url(function () {
                        return ListBulkimports::getUrl();
                    })
                    ->group('certificates'),
            ])
            ->navigation()
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
