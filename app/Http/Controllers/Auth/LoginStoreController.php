<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();

        $remember = $request->boolean('remember');

        if (Auth::attempt($validated, $remember)) {
            return redirect()->route('pages.home');
        } else {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'error' => 'The provided credentials do not match our records.',
                ]);
        }
    }
}
