<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request)
    {
         /** @var \Illuminate\Http\Request $request */
        $validated = $request->validated();
        
        $user = User::create($validated);
        
        if ($user) {
            event(new Registered($user));
        }

        $credentials = $request->only('email', 'password');

        Auth::attempt($credentials);

        $request->session()->regenerate();
        
        return redirect()->route('pages.home');
    }
}
