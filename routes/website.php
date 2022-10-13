<?php

// Admin Route
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get(         'web_login',             'WebController\AuthController@index'    )->name('website/login');//index
Route::post(         'web/login',             'WebController\AuthController@login'    )->name('web/login');//index

Route::get(         'web_register',           'WebController\AuthController@reg'    )->name('website/reg');//index
Route::post(         'web/registerr',             'WebController\AuthController@register'    )->name('web/registerr');//index
Route::get(         'groupss',             'WebController\AuthController@group'    )->name('mygroup');//index

Route::group(['namespace' => 'WebController', 'middleware' => 'website' ], function(){
    
    Route::get(  '/',             'HomeController@index'    );//index
    Route::get(  'chat',             'MessagesController@chat'    );//index
    Route::post(  'chat_send',             'MessagesController@sendMessage'    );//index
    Route::get(  'profile',             'MessagesController@index'    );//index
    Route::post(  'password_done',             'MessagesController@submitPassword'    );//index
    Route::get(  'monthes',             'HomeController@index'    )->name('months');//monthes
    Route::post('/subscribe', 'HomeController@subscribe');
    Route::group(['middleware' => 'check_subscription_web'], function ()
    {
        Route::get(  '{month_id}/lessons',             'LessonsController@index'    );//lessons يجب الاشتراك
        Route::get('{month_id}/lessons/{lesson_id}/{video_id?}', 'LessonsController@show'); // Lesson Content Video يجب الاشتراك
        Route::get('{month_id}/lessons_pdf/{lesson_id}', 'LessonsController@pdf'); // Lesson Content PdF يجب الاشتراك
        Route::get('alert', 'LessonsController@not'); // get alert
        Route::get('{month_id}/lessons_quest/{lesson_id}', 'LessonsController@questions'); // Lesson question يجب الاشتراك

        Route::post('{month_id}/lessons/comments/add_comment', 'CommentsController@add_comment'); // Lesson Commment يحب الاشتراك
        Route::post('{month_id}/reply/{comment_id}', 'CommentsController@reply_comment'); // Lesson Commment Repy يحب الاشتراك

        Route::post('{month_id}/lessons/{lesson_id}/do_test', 'LessonsController@do_test'); // Do Lesson Test
    });


   
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

















