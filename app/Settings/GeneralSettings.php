<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

/**
 * Class GeneralSettings
 *
 * @package \App\Settings
 */
class GeneralSettings extends Settings
{

    public $site_name = 'Alfa Medical ';
    public $logo = '';
    public $company = '';
    public $copyright = '© 2022 Alfa Medical. All rights reserved.';


    public static function group(): string
    {
        return 'general';
    }

}
