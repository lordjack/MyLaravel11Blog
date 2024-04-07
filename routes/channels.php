<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('posts', function ($user) {
    // Allow all authenticated users to listen to the channel
    return true;
});

Broadcast::channel('posts.{postId}', function (User $user, int $postId) {
    return $user->id === Post::findOrNew($postId)->user_id;
});