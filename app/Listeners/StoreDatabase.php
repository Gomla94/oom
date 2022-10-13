<?php

namespace App\Listeners;

use App\Events\PushNotifications;
use App\Notifications\StudentAlerts;
use Illuminate\Support\Facades\Notification;

class StoreDatabase
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
        Notification::send($event->users, new StudentAlerts(['title' => $event->title, 'details' => $event->details, 'url' => $event->url]));
    }
}
