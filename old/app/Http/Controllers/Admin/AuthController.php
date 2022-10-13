<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate(
        [
            'email'         => 'required|email|exists:admins,email',
            'password'      => 'required'
        ]);

        if(! Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return back()->withErrors('Invalid Login !');
        }

        return redirect()->route('admin.home.index');
    }

    public function update_profile(Request $request)
    {
        $request->validate(
        [
            'name'      => 'required|string',
            'email'     => 'required|unique:admins,email,' . Helper::admin_user()->id,
            'password'  => 'nullable|min:6|max:191'
        ]);

        Helper::admin_user()->update($request->all());

        return Helper::redirect($request->new, 'home');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return back();
    }
}
