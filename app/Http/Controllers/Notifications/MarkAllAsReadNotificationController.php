<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkAllAsReadNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $notification = $user->unreadNotifications->markAsRead();

        return $notification
            ? back()
            : back()->with('status', 'ocorreu um erro.');
    }
}
