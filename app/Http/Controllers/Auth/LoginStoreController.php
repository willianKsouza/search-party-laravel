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
        /** @var \Illuminate\Http\Request $request */
        
        $validated = $request->validated();
    
        $remember = $request->boolean('remember');

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('pages.home');
        } else {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'error' => __('auth.failed'),
                ]);
        }
    }
}
