<?php

namespace App\Filament\Resources\BulkimportResource\Pages;

use App\Filament\Resources\BulkImportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBulkimports extends ListRecords
{
    protected static string $resource = BulkImportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver(),
        ];
    }
}
