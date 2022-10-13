<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\PushNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Resources\Api\V1\MessagesResource;
use App\Models\Admin;
use App\Models\Chat;

class MessagesController extends BaseController
{
    public function index()
    {
        return $this->response(new MessagesResource(Auth::user()->messages));
    }

    public function send(Request $request)
    {
        $chat = is_null(Auth::user()->chat) ?
        Auth::user()->chat()->create(['admin_id' => 6])
        : Auth::user()->chat;

        $validate = Validator::make($request->all(),
        [
            'details'           => 'required',
        ],
        [
            'details.required'  => 'يجب إدخال الرسالة'
        ]);

        if($validate->fails())
        {
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors(), 422);
        }

        $chat->messages()->create(
        [
            'details'       => $request->details,
            'model'         => 'App\Models\Student',
            'student_view'  => true,
            'sender_id'     => Auth::user()->id
        ]);
        //return $request->details;

        event(new PushNotifications(Admin::find($chat->admin_id), 'رسالة جديدة', $request->details, route('admin.chats.chat', ['chat' => $chat->id])));

        return $this->response([], "تم إرسال الرسالة بنجاح");
    }
}
