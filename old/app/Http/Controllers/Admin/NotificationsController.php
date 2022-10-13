<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function read()
    {
        Helper::admin_user()->unreadNotifications->markAsRead();
        return response()->json(['message' => 'success'], 200);
    }
}
