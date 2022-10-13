<?php

namespace App\Models;

use Spatie\Valuestore\Valuestore;

class Settings extends Valuestore
{
    public static function find($key, $default = null)
    {
        if ($key === null)
            return app(Settings::class);

        return app(Settings::class)->get($key, $default);
    }
}
