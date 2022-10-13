<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    public function update(Request $request, $id)
    {
        Device::findOrFail($id)->update(['status' => (boolean) $request->status]);
        return Helper::redirect(true, 'users.students');
    }
}
