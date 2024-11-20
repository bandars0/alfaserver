<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard;

/**
 * Class DashboardPage
 *
 * @package \App\Filament\Pages
 */
class DashboardPage extends Dashboard
{
    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\Certificate::class
        ];
    }

}
