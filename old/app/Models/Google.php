<?php

namespace App\Models;

use Spatie\Valuestore\Valuestore;

class Google extends Valuestore
{
    public static function find($key, $default = null)
    {
        if ($key === null)
            return app(Google::class);

        return app(Google::class)->get($key, $default);
    }
}
