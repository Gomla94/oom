<?php

namespace App\Helpers\Traits;

use App\Models\Chat;
use LaravelFCM\Facades\FCM;
use Illuminate\Support\Facades\File;
use LaravelFCM\Message\OptionsBuilder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

trait Notifications
{
    public static function alert($class, $col = 'status')
    {
        $class = 'App\Models\\' . $class;
        if(class_exists($class))
        {
            return $class::where($col, false)->count() ? '<span class="badge badge-success pull-right">' . $class::where($col, false)->count() . '</span>' : '';
        }
    }

    public static function unread_msgs()
    {
        $unread_msgs = Chat::whereHas('messages', function ($msg)
        {
            $msg->where('admin_view', false);
        })->count();

        return $unread_msgs ? '<span class="badge badge-success pull-right">' . $unread_msgs . '</span>' : '';
    }

    public static function push_notification($title, $body, $tokens)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body);

        $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();

        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();
    }
}
