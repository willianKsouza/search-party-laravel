<?php

namespace App\Listeners;

use App\Events\MessageSentByUserEvent;
use App\Events\NotificationNewMessageForOuthersEvent;
use App\Notifications\NewMessageInPost;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

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

        $online_users = Cache::store('database')->get("post_online_users:{$message->post_id}", []);

        function hasUserReadNotification($participant)
        {
            return array_any($participant->unreadNotifications->toArray(), fn($notification)
            => $notification['type'] == 'new-message-in-post' && $notification['read_at'] == null);
        }

        foreach ($participants as $participant) {
            if (!in_array($participant->id, $online_users)) {
                // if (!hasUserReadNotification($participant)) {
                //     $participant->notify(new NewMessageInPost($post_title));
                // }
                $participant->notify(new NewMessageInPost($post_title));
            }
        }
    }
}
