<?php

namespace App\Listeners;

use App\Events\MessageSentByUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnMessageSentByUserListener
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
    public function handle(MessageSentByUserEvent $event): void
    {
        //
    }
}
