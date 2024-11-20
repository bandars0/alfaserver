<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

/**
 * Class PdfSettings
 *
 * @package \App\Settings
 */
class PdfSettings extends Settings
{
    public string $header = '';
    public string $footer = '';
    public string $co_name = 'Alfa Medical';
    public string $logo = '';

    public static function group(): string
    {
        return 'pdf';
    }
}
