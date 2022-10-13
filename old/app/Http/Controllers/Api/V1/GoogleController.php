<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\GoogleResource;
use App\Models\Google;

class GoogleController extends Controller
{
    public function get() : GoogleResource
    {
 
        if(Google::find('ad_mob')==false){
            $banner =
           [
            'status'     => false,
            'id'         => null,
           ];
            $interstital =
            [
             'status'        => false,
             'id'            =>null,
             'counter'       => null,
            ];
        $data =
        [
            'admob_status'     => Google::find('ad_mob'),
            'admob_id'         => null,
            'banner'           => $banner,
            'interstital'      => $interstital,

        ];
           
        }
        else{

            $banner =
           [
            'status'     => Google::find('banner_status'),
            'id'         => Google::find('banner_code'),
           ];
            $interstital =
            [
             'status'        => Google::find('add_status'),
             'id'            => Google::find('add_code'),
             'counter'       => Google::find('no_show'),
            ];
        $data =
        [
            'admob_status'     => Google::find('ad_mob'),
            'admob_id'         => Google::find('google_id'),
            'banner'           => $banner,
            'interstital'      => $interstital,

        ];
    }
  return new GoogleResource($data );


    }
}
