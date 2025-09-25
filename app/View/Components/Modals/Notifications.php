<?php

namespace App\View\Components\Modals;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Boolean;

class Notifications extends Component
{
    private User $user;
    public Collection $notificationsFormated;
    public Collection $unreadNotifications;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = User::findOrFail(Auth::user()->id);

        $this->unreadNotifications = $this->user->unreadNotifications;

        $this->notificationsFormated = $this->unreadNotifications
            ->map(fn($n) => [
                'id' => $n->id,
                'type' => $n->type,
                'post_title' => $n->data['post_title'] ?? '',
                'created_at' => $n->created_at,
            ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.notifications');
    }
}
