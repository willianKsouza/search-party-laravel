<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{user_id}', function ($user, $user_id) {
    return true;
});

Broadcast::channel('chat.post.{post_id}', function ($user, $post_id) {
    return true;
});