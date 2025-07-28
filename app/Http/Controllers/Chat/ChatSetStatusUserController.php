<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ChatSetStatusUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $post_id)
    {

        $cache = Cache::store('database');

        $online_users = $cache->get("post_online_users:{$post_id}", []);

        $is_online = in_array(Auth::user()->id, $online_users);

        if ($is_online) {
            $online_users = array_filter($online_users, fn($id) => $id !== Auth::user()->id);
        } else {

            $online_users[] = Auth::user()->id;
        }

        if (empty($online_users)) {

            $cache->forget("post_online_users:{$post_id}");
        } else {

            $cache->put("post_online_users:{$post_id}", array_values($online_users));
        }

        return response()->noContent();
    }
}
