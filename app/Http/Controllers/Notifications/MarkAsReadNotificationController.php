<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkAsReadNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $user = Auth::user();

        $notification = $user->notifications()->find($id);

        if ($notification) {
            $notification->delete();
        }

        return $notification
            ? redirect()->route('pages.home')
            : redirect()->route('pages.home')->with('status', 'ocorreu um erro.');
    }
}
