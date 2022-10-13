<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Helpers\Classes\Helper;
use App\Models\Comment as Model;
use App\Events\PushNotifications;
use App\Http\Controllers\Controller;
use App\Models\Student;

class CommentsController extends Controller
{

    protected $data =
    [
        'route'     => 'lessons.comments',
        'elements'  => 'comments',
        'element'   => 'comment',
        'view'      => 'comments',
    ];

    public function index($id)
    {
        $items = Lesson::findOrFail($id)->comments()->get();
        return view('admin.' . $this->data['route'] . '.index', compact('items'))->with($this->data);
    }

    public function show($lesson_id, $comment_id)
    {
        $comment = Lesson::findOrFail($lesson_id)->comments()->findOrFail($comment_id);
        return view('admin.' . $this->data['route'] . '.show', compact('comment'))->with($this->data);
    }

    public function send_comment(Request $request, $lesson_id, $comment_id)
    {
      
        $comment = Lesson::findOrFail($lesson_id)->comments()->findOrFail($comment_id);

        $request->validate(
        [
            'text'             => 'required'
        ]);

        $comment->replies()->create(
        [
            'text'              => $request->text,
            'model'             => 'App\Models\Admin',
            'user_id'           => $request->user_id
        ]);
        
       

		event(new PushNotifications(Student::findOrFail($comment->replies()->first()->user_id), 'الإستاذ رد على تعليقك', $request->text, ''));

        return Helper::redirect(1, $this->data['route']);
    }


    public function destroy(Request $request, $lesson_id, $comment_id)
    {
        $item = Lesson::findOrFail($lesson_id)->comments()->findOrFail($comment_id);
        $item->replies()->delete();
        $item->delete();
          return back()->with('success', 'Done');
/*        return Helper::redirect($request->new, $this->data['route']);
*/    }
}
