<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NotificationNewMessageForOuthersEvent implements ShouldQueue, ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public int $user_id,
        public int $post_id,
        public string $post_title
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.notify.' . $this->user_id)
        ];
    }

    public function broadcastAs(): string
    {
        return 'user.notify';
    }

    public function broadcastWith(): array
    {
        return [
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'post_title' => $this->post_title,
        ];
    }
}
