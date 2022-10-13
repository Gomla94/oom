<?php

namespace App\Helpers\Traits;

use Illuminate\Support\Facades\Auth;

Trait Language
{
    public static function admin_trans($word, $attr = [])
    {
        return ucwords(__('admin.' . $word, $attr));
    }
}