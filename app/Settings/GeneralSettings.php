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

    public string $site_name = 'Alfa Medical';
    public string $logo = '';
    public string $company = '';
    public string $copyright = '© 2022 Alfa Medical. All rights reserved.';


    public static function group(): string
    {
        return 'general';
    }

}
