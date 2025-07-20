<?php

namespace App\Listeners;

use App\Events\MessageSentByUserEvent;
use App\Events\NotificationNewMessageForOuthersEvent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class OnMessageSentByUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(MessageSentByUserEvent $event): void
    {
        $message = $event->message;

        $post_title = $message->post->title;

        $participants = $message->post
            ->participants()
            ->where('user_id', '!=', $message->user_id)
            ->wherePivot('last_read_at', '<=', $message->created_at)
            ->get();

        foreach ($participants as $participant) {
            broadcast(new NotificationNewMessageForOuthersEvent($participant->id, $message->post_id, $post_title))->toOthers();
        }
    }
}
