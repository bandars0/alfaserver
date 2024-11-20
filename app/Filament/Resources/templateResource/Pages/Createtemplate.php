<?php

namespace App\Filament\Resources\templateResource\Pages;

use App\Filament\Resources\templateResource;
use Filament\Resources\Pages\CreateRecord;

class Createtemplate extends CreateRecord
{
    protected static string $resource = templateResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
