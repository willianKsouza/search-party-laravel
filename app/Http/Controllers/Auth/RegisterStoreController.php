<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        if ($user) {
            event(new Registered($user));
        }

        return redirect()->route('pages.home');
    }
}
