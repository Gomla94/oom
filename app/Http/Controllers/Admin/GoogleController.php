<?php

namespace App\Http\Controllers\Admin;

use App\Models\Google;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GoogleController extends Controller
{
    public function index()
    {
        return view('admin.google.index');
    }

    public function update(Request $request, Google $google)
    {
       $adm_ob       = $request['ad_mob'] = (bool) $request->ad_mob;
      $add_status    = $request['add_status'] = (bool) $request->add_status;
      $banner_status = $request['banner_status'] = (bool) $request->banner_status;
       if($adm_ob){
        $request->validate(
            [
                'google_id'                     => 'required',
                
            ]);

       }

       if($add_status){
        $request->validate(
            [
                'no_show'                       => 'required',
                'add_code'                      => 'required',
               
            ]);

       }

       if($banner_status){
        $request->validate(
            [
                'banner_code'                     => 'required',
               
            ]);

       }
        foreach ($request->except(['_token', '_method']) as $name => $column)
        {
            if($request->hasFile($name))
            {
                Storage::delete(Google::find($name));
                $column = $request->file($name)->store('google');
            }

            $google->put($name, is_array($column) ? Helper::encode($column) : $column);
        }

        if(!$adm_ob){
            return redirect()->route('admin.home.index');
    
           }

        return redirect()->route('admin.home.index')->withSuccess(Helper::admin_trans('success'));

    }
}
