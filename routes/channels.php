<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('chat.post.{post_id}', function ($user, $post_id) {
    return $user;
});

Broadcast::channel('user.notify.{user_id}', function ($user, $user_id) {
    return (int) $user->id === (int) $user_id;
});


