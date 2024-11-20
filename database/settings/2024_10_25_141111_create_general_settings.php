<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Alfa Medical');
        $this->migrator->add('general.logo', '');
        $this->migrator->add('general.company', 'Alfa Medical');
    //
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('pdf.header', '');
        $this->migrator->add('pdf.footer', '');
        $this->migrator->add('pdf.co_name', '');
    }
};
