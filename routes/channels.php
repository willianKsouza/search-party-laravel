<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.post.{post_id}', function ($user, $post_id) {
    return true;
});
