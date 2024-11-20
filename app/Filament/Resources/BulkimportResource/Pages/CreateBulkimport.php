<?php

namespace App\Filament\Resources\BulkimportResource\Pages;

use App\Filament\Resources\BulkImportResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBulkimport extends CreateRecord
{
    protected static string $resource = BulkImportResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
