<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = User::findOrFail(Auth::user()->id);
        $notificationsFormated = $user->unreadNotifications
            ->map(fn($n) => [
                'post_title' => $n->data['post_title'] ?? '',
                'created_at' => $n->created_at,
            ]);
        return view('pages.notifications', compact('notificationsFormated'));
    }
}
