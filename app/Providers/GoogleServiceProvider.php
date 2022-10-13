<?php

namespace App\Providers;

use App\Models\Google;
use App\Rules\PdfOrLink;
use App\Validators\Rest;
use App\Helpers\Classes\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Resources\Json\Resource;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::share('admin_temp', url('/asset/admin') . '/');
        View::share('general_temp', url('/asset/') . '/');

        $this->app->singleton(Google::class, function ()
        {
            return Google::make(storage_path('app/google.json'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('checkpasswd', function($attribute, $value, $parameters)
        {
            if(! Hash::check( $value , $parameters[0]))
                return false;
            return true;
        });

        Validator::extend('mac_address', function ($attribute, $value, $parameters)
        {
            if(! preg_match('/^([a-fA-F0-9]{2}:){5}[a-fA-F0-9]{2}$/', $value))
                return false;
            return true;
        });

        Validator::extend('pdf_or_link', function ($attribute, $value)
        {
            if(is_file($value))
                return $value->getClientOriginalExtension() == 'pdf';

            return filter_var($value, FILTER_VALIDATE_URL) !== false;
        }, Helper::admin_trans('pdf_or_link'));

        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new Rest($translator, $data, $rules, $messages);
        });

        Blade::if('admincan', function ($role_permission)
        {
            return Helper::admin_user()->can($role_permission);
        });
    }
}
