<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\Chat as Model;
use App\Helpers\Classes\Helper;
use App\Events\PushNotifications;
use App\Http\Controllers\Controller;
use App\Models\FcmToken;


class ChatsController extends Controller
{

    protected $data =
    [
        'route'     => 'chats',
        'elements'  => 'chats',
        'element'   => 'chat',
        'view'      => 'chats',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Model::get();
        return view('admin.' . $this->data['view'] . '.index', compact('items'))->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chat(Request $request, $id)
    {
        $chat = Model::findOrFail($id);
        $chat->messages()->update(['admin_view' => true]);
        $request->has('notify_id') ? Helper::admin_user()->notifications()->find($request->notify_id)->markAsRead() : '';
        return view('admin.' . $this->data['view'] . '.chat', compact('chat'))->with($this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_message(Request $request, $id)
    {
        $chat = Model::findOrFail($id);

        $request->validate(
        [
            'details'             => 'required'
        ]);

        $chat->messages()->create(
        [
            'details'           => $request->details,
            'model'             => 'App\Models\Admin',
            'sender_id'         => Helper::admin_user()->id
        ]);
          $token     = FcmToken::where('student_id', $chat->student->id)->pluck('token')->toArray();
        event(new PushNotifications($chat->student, 'رسالة جديدة', $request->details,$token));

        return Helper::redirect(1, $this->data['route']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Model::findOrFail($id);
        $grades = Grade::pluck('title', 'id')->prepend(Helper::admin_trans('choose'), 0);
        return view('admin.' . $this->data['view'] . '.edit', compact('item', 'grades'))->with($this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Model::findOrFail($id);

        $request->validate(
        [
            'title'             => 'required|unique:chats,title,' . $item->id,
            'grade_id'          => 'required|exists:grades,id'
        ]);

        $item->update($request->all());

        return Helper::redirect($request->new, $this->data['route']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $item = Model::findOrFail($id);
/*        $item->students()->update(['group_id' => null]);
*/        $item->delete();
        return Helper::redirect($request->new, $this->data['route']);
    }
}
