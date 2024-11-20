<?php

namespace App\Filament\Resources\BulkimportResource\Pages;

use App\Filament\Resources\BulkImportResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBulkimport extends EditRecord
{
    protected static string $resource = BulkImportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
