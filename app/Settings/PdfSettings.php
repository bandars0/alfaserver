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
    public $header;
    public $footer;
    public $co_name = 'Alfa Medical';
    public $logo;

    public static function group(): string
    {
        return 'pdf';
    }
}
