<?php

namespace App\Filament\Widgets;

use App\Enum\CertificateStatus;
use App\Filament\Resources\CertificateResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Certificate extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total', \App\Models\Certificate::all()->count()),
            Stat::make('Valid', \App\Models\Certificate::where('status', CertificateStatus::VALID)->count()),
            Stat::make('Expired', \App\Models\Certificate::where('status', CertificateStatus::EXPIRED)->count()),
            Stat::make('Pending', \App\Models\Certificate::where('status', CertificateStatus::PENDING)->count()),
        ];
    }
}
