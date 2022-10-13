<?php

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Un Authorized

// Authentication
Route::prefix('oauth')
->namespace('Auth')
->group(function ()
{
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');



Route::post('forgot-password', 'AuthController@forgot_password');
Route::get('reset-password/{token}', 'AuthController@showResetPasswordForm')->name('reset.password.get')->middleware('web');
Route::post('reset-password', 'AuthController@submitResetPasswordForm')->name('reset.password.post');

});

Route::prefix('grades')->group(function ()
{
    Route::get('/', 'GradesController@index');
    Route::get('/{id}/groups', 'GradesController@groups');
});
Route::get('/groups', 'GroupsController@index');

Route::get('settings', 'SettingsController@get');
Route::get('google', 'GoogleController@get');

// Authorized

Route::middleware('auth:api')->group(function ()
{
    Route::prefix('profile')->group(function ()
    {
        Route::get('/', 'StudentsController@information');
        Route::get('count', 'StudentsController@count_message_notifications');
        Route::post('password/update', 'StudentsController@password_update');
        Route::post('update', 'StudentsController@update');
        Route::get('/notifications', 'StudentsController@notifications');
        Route::post('/notifications/{notification}/update_status', 'StudentsController@notifications_update_status');
        Route::post('/notifications/update_status', 'StudentsController@allNotifications_update_status');
    });

    Route::post('/chat/{id}/update_status', 'ChatsController@update_status');
    Route::post('/chat/update_status', 'ChatsController@allMessages_update_status');

    Route::prefix('messages')->group(function ()
    {
        Route::get('/', 'MessagesController@index');
        Route::put('/send', 'MessagesController@send');
    });

    Route::prefix('months')->group(function ()
    {
        Route::get('/', 'MonthsController@available');
        Route::get('user_month', 'MonthsController@user_month');
        Route::post('/subscribe', 'MonthsController@subscribe');

        Route::group(['middleware' => 'check_subscription'], function ()
        {
            Route::get('{month_id}/lessons', 'LessonsController@get'); //all lessons
            Route::get('{month_id}/lessons/{lesson_id}', 'LessonsController@show'); // Lesson Content
            Route::get('{month_id}/lessons/{lesson_id}/questions', 'LessonsController@questions'); // Lesson Questions
            Route::put('{month_id}/lessons/{lesson_id}/do_test', 'LessonsController@do_test'); // Do Lesson Test
            Route::put('{month_id}/lessons/comments/add_comment', 'CommentsController@add_comment');
            Route::put('{month_id}/lesson/comments/{comment_id}', 'CommentsController@reply_comment');
        });
    });
});
 