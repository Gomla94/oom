<?php

namespace App\Listeners;

use App\Models\Student;
use App\Helpers\Classes\Helper;
use App\Events\PushNotifications;
use App\Models\FcmToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PushNotifications as NotificationsPushNotifications;

class PushFirebase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PushNotifications  $event
     * @return void
     */
    public function handle(PushNotifications $event)
    {
        $tokens     = $event->token;
        if(! empty($tokens))
            Helper::push_notification($event->title, $event->details, $tokens);
    }
}
