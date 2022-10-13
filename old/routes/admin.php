<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard'], function ()
    {
Route::namespace('Admin')->group(function ()
{

    Route::group(['middleware' => 'guest:admin', 'as' => 'auth.'], function ()
    {
        Route::view('login', 'admin.auth.login')->name('login.view');
        Route::post('login', 'AuthController@login')->name('login');
    });

    Route::group(['middleware' => 'admin'], function ()
    {
        Route::group(['as' => 'auth.'], function ()
        {
            Route::post('logout', 'AuthController@logout')->name('logout');
            Route::view('profile', 'admin.auth.profile')->name('profile.view');
            Route::post('profile', 'AuthController@update_profile')->name('profile');
        });

        Route::view('/', 'admin.home')->name('home.index');

        Route::group(['prefix' => 'roles_permissions', 'as' => 'roles_permissions.', 'namespace' => 'Roles', 'middleware' => 'admincan:roles_and_permissions'], function ()
        {
            Route::resource('roles', 'RolesController')->except(['show']);

            Route::resource('permissions', 'PermissionsController')->only(['index']);
            if(env('APP_ENV') == 'locale')
            {
                Route::resource('permissions', 'PermissionsController')->except(['index', 'show']);
            }
        });

        Route::group(['prefix' => 'users', 'namespace' => 'Users', 'as' => 'users.'], function ()
        {
            Route::resource('admins', 'AdminsController')->middleware('admincan:admins')->except(['show']);
            Route::resource('students', 'StudentsController')->middleware('admincan:students');
            Route::patch('device/{id}', 'DevicesController@update')->name('update_device');
            //Route::get('delete_all_users', 'StudentsController');
        });

        Route::resource('alerts', 'AlertsController')->except(['show', 'edit']);

        Route::group(['prefix' => 'chats', 'as' => 'chats.', 'middleware' => 'admincan:messages'], function ()
        {
            Route::get('/', 'ChatsController@index')->name('index');
            Route::get('{chat}/view', 'ChatsController@chat')->name('chat');
            Route::delete('{chat}/destroy', 'ChatsController@destroy')->name('destroy');
            Route::put('{chat}/send_message', 'ChatsController@send_message')->name('send_message');
        });
        Route::resource('grades', 'GradesController')->except(['show'])->middleware('admincan:messages'); // Grades
        Route::resource('groups', 'GroupsController')->except(['show']); // Groups
        Route::resource('months', 'MonthsController')->except(['show']); // Months
        Route::resource('test', 'TestsController')->middleware('admincan:tests')
        ->only(['index', 'show']);;

        Route::resource('subscriptions', 'SubscriptionsController'); // Subscription Requests
        Route::resource('questions', 'QuestionsController')->except(['show']); // Questions
        Route::group(['prefix' => 'lessons', 'as' => 'lessons.',], function () // Lessons
        {
            Route::resource('/', 'LessonsController')
                ->except(['show'])
                ->middleware('admincan:lessons')
                ->parameters(['' => 'lesson']);
            Route::group(['as' => 'comments.', 'middleware' => 'admincan:comments'], function ()
            {
                Route::get('{lesson}/comments', 'CommentsController@index')->name('index');
                Route::delete('{lesson}/comments/{comment}', 'CommentsController@destroy')->name('destroy');
                Route::get('{lesson}/comments/{comment}', 'CommentsController@show')->name('show');
                Route::put('{lesson}/comments/{comment}', 'CommentsController@send_comment')->name('send_comment');
            });

            Route::post('video/delete', 'LessonsController@delete_video')->name('delete_video');
            Route::post('file/delete', 'LessonsController@delete_file')->name('delete_file');
            Route::get('groups', 'LessonsController@get_groups')->name('get_groups');
            Route::get('months', 'LessonsController@get_months')->name('get_months');

        }); // --- Lessons

        Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () // questions
        {
            Route::get('months', 'LessonsController@get_months')->name('get_months');

        }); // --- questions

        
  
        
        Route::post('read_notifications', 'NotificationsController@read')->name('read_notifications');

        Route::group(['prefix' => 'settings', 'as' => 'settings.','middleware' => 'admincan:messages'  ], function ()
        {
            Route::get('/', 'SettingsController@index')->name('index');
            Route::put('/update', 'SettingsController@update')->name('update');
        });


        Route::group(['prefix' => 'google', 'as' => 'google.' ], function ()
        {
            Route::get('/', 'GoogleController@index')->name('index');
            Route::put('/update', 'GoogleController@update')->name('update');
        });
    });
});


});