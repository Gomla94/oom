<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request, Settings $settings)
    {
       $banner_status= $request['banner_status'] = (bool) $request->banner_status;

       if($banner_status){
        $request->validate(
            [
                'number'                     => 'required',
                'time'                       => 'required',

               
            ]);

       }

        foreach ($request->except(['_token', '_method']) as $name => $column)
        {
            if($request->hasFile($name))
            {
                Storage::delete(Settings::find($name));
                $column = $request->file($name)->store('settings');
            }

            $settings->put($name, is_array($column) ? Helper::encode($column) : $column);
        }

        return redirect()->route('admin.home.index')->withSuccess(Helper::admin_trans('success'));
    }
}
