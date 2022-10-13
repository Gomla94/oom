<?php

namespace App\Helpers\Traits;

use App\Helpers\Classes\Helper;
use Illuminate\Support\Facades\Auth;

Trait Admin
{
    public static function admin_title($title)
    {
        return Helper::app_name() . ' | ' . Language::admin_trans($title);
    }

    public static function admin_user()
    {
        return Auth::guard('admin')->user();
    }
}