<?php

namespace App\Http\Controllers\WebController;

use App\Models\Month;
use App\Models\Lesson;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentsController extends Controller
{
    public function add_comment(Request $request)
    {
      
        $validate = Validator::make($request->all(),
        [
            'lesson_id'         => 'required|exists:lessons,id',
            'video_id'          => 'required|exists:videos,id',
            'comment'           => 'required',
        ],
        [
            'comment.required'  => 'يجب إدخال التعليق'
        ]);
     
        if($validate->fails())
        {
           
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors());
        }
      

        $comment = Lesson::findOrFail($request->lesson_id)->comments()->create(
        [
            'video_id'          => $request->video_id
        ]);

       $comm =    $comment->replies()->create(
            [
                'text'              => $request->comment,
                'model'             => 'App\Models\Student',
                'user_id'           => Auth::user()->id
            ]);
      

        Comment::findOrFail($comment->id)->update(['comment_id' => $comm->id]);


        return back();
    }

    public function reply_comment(Request $request, $month_id, $comment_id)
    {
        
     
        $comment = Comment::findOrFail($comment_id);

        $validate = Validator::make($request->all(),
        [
            'comment'           => 'required',
        ],
        [
            'comment.required'  => 'يجب إدخال التعليق'
        ]);

        if($validate->fails())
        {
            return $this->error("البيانات المدخلة غير صحيحة", $validate->errors(), 422);
        }

        $comment->replies()->create(
        [
            'text'      => $request->comment,
            'model'     => 'App\Models\Student',
            'user_id'   => Auth::user()->id
        ]);

        return back();
    }
   
}
