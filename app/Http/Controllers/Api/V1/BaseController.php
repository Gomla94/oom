<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    private $_response;

    public function response($result = [], $message = "")
    {
        $this->_response =
        [
            'success'       => true,
            'data'          => $result,
            'message'       => $message
        ];

        return response()->json($this->_response, 200);
    }

    public function error($error_message, $error_data = [], $code = 422)
    {
        $this->_response =
        [
            'success'       => false,
            'message'       => $error_message,
        ];
        ! empty($error_data) ? $this->_response['errors'] = $error_data : '';

        return response()->json($this->_response, $code);
    }
}
