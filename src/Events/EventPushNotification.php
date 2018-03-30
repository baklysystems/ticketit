<?php

namespace Kordy\Ticketit\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventPushNotification extends Event
{
    use SerializesModels;
    public $user_ids;
    public $title;
    public $msg;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_ids,$title,$msg)
    {
        $this->user_ids = $user_ids;
        $this->title= $title;
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
