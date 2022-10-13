<?php

namespace App\Helpers\Traits;


Trait Response
{

    public static function response($result = [], $message = "")
    {
        $response =
        [
            'success'       => true,
            'data'          => $result,
            'message'       => $message
        ];

        return response()->json($response, 200);
    }

    public static function error($error_message, $error_data = [], $code = 422)
    {
        $response =
        [
            'success'       => false,
            'message'       => $error_message,
        ];
        ! empty($error_data) ? $response['errors'] = $error_data : '';

        return response()->json($response, $code);
    }
}
