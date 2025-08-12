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

        $message->load(['post', 'user']);

        $post_title = $message->post->title;

        $participants = $message->post
            ->participants()
            ->where('user_id', '!=', $message->user_id)
            ->wherePivot('last_read_at', '<', $message->created_at)
            ->whereDoesntHave('notifications', function (Builder $query) {
                $query->where('type', 'new-message-in-post')
                    ->whereNull('read_at');
            })
            ->get();

        $online_users = Cache::store('database')->get("post_online_users:{$message->post_id}", []);

        foreach ($participants as $participant) {
            if (!in_array($participant->id, $online_users)) {
                $participant->notify(new NewMessageInPost($post_title));
            }
        }
    }
}
