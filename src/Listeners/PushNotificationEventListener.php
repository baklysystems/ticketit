<?php

namespace Kordy\Ticketit\Listeners;

use Kordy\Ticketit\Events\EventPushNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Edujugon\PushNotification\PushNotification;

class PushNotificationEventListener
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
     * @param  EventPushNotification  $event
     * @return void
     */
    public function handle(EventPushNotification $event)
    {

        $users = User::find($event->user_ids);
        $push = new PushNotification('fcm');
        $push->setMessage([
            'notification' => [
                'title'=>$event->title,
                'body'=>$event->msg,
                'sound' => 'default'
            ]

        ])
        ->setDevicesToken($users->pluck('devicetoken')->toArray()) //deviceToken1
        ->send();
        //->getFeedback();

        return true;
    }
}
