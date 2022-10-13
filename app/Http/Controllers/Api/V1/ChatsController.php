<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatsController extends BaseController
{
    public function update_status($id)
    {
        $chat = Chat::where('student_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        $chat->messages()->update(['student_view' => true]);
        return $this->response();
    }
     public function allMessages_update_status(Request $request)
    {
      //  $chat = Chat::where('student_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        // $chat->messages()->update(['student_view' => true]);
        
      /*  foreach($notification as $notification){
            auth()->user()->alerts()->updateExistingPivot($request->id, ['view_status' => true]);
        }
        */
        
        Message::where('model', 'App\Models\Admin')->whereIn('id', $request->id)->update(['student_view' => '1']);

       return $this->response();
        
        
    }
}
