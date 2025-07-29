<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ChatSetOnlineStatusUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $post_id)
    {

        $cache = Cache::store('database');

        $online_users = $cache->get("post_online_users:{$post_id}", []);

        $is_online = in_array(Auth::user()->id, $online_users);

        if (!$is_online) {
            $online_users[] = Auth::user()->id;

            $cache->put("post_online_users:{$post_id}", array_values($online_users), 300);

            return response()->noContent();
        }

        return response()->noContent();
    }
}
