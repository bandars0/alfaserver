<?php

namespace App\Filament\Resources\templateResource\Pages;

use App\Filament\Resources\templateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listtemplates extends ListRecords
{
    protected static string $resource = templateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
