<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Pages\Concerns\CanUseDatabaseTransactions;
use Filament\Pages\Concerns\HasUnsavedDataChangesAlert;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;

class BulkImporter extends Page
{
    use  InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.pages.bulk-importer';
    protected ?string $maxContentWidth = 'md';
    public $bulk_file;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('bulk_file')->label('Upload File')->required()
        ];
    }

    public function getMaxContentWidth(): MaxWidth|string|null
    {
        return MaxWidth::ScreenMedium;
    }

    public function mount(): void
    {
        $this->form->fill([]);
    }


    public function submit()
    {
        $validatedData = $this->validate([
            'bulk_file' => ['required'],

        ]);

        // Handle form submission logic
        $data = $this->form->getState();

        // Example: Save to the database, or send an email
        // ContactForm::create($data);

        Notification::make()
            ->title('Form submitted successfully!')
            ->success()
            ->send();
    }

    protected function getActions(): array
    {
        return [
//          Action::make('submit')
//                ->label('Submit')
//                ->action('submit')
//                ->color('primary'),
        ];
    }
}
