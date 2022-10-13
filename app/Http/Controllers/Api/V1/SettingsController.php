<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SettingsResource;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function get() : SettingsResource
    {
        $data =
        [
            'about'         => Settings::find('about'),
            'phone'         => Settings::find('phone'),
            'whats'         => Settings::find('whats'),
            'banner_image'  => Helper::storage_image(Settings::find('banner_image')),
            'banner_status' => Settings::find('banner_status'),
            'number'        => Settings::find('number'),
            'time'          => Settings::find('time')*1000,

        ];
        return new SettingsResource($data);
    }
}
