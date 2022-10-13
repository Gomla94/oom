<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PushNotifications
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users;
    public $title;
    public $details;
    public $url;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($users, $title, $details, $token, $url = null)
    {
        $this->users        = $users;
        $this->title        = $title;
        $this->details      = $details;
        $this->token        = $token;
        $this->url          = $url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
