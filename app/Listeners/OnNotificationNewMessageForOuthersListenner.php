<?php

namespace App\Listeners;

use App\Events\NotificationNewMessageForOuthersEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnNotificationNewMessageForOuthersListenner
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotificationNewMessageForOuthersEvent $event): void
    {
        //
    }
}
