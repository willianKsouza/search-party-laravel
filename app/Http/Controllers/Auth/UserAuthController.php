<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function storeRegister(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        if ($user) {
            event(new Registered($user));
        }

        return response()->json([
            'redirect' => route('pages.home'),
        ]);
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $validated = $request->validated();

        $remember = $request->remember;

        if (Auth::attempt($validated, $remember)) {
            return response()->json([
                'redirect' => route('pages.home'),
            ]);
        } else {
            return response()->json([
                'error' => 'Invalid credentials',
            ], 401);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verifyEmailNotice()
    {
        if (Auth::check()) {
            return redirect()->route('pages.home');
        }
        return view('pages.auth.verify-email-notice');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function resendVerificationEmail(Request $request): RedirectResponse
    {

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }


    public function showChangePasswordForm(Request $request)
    {
        return view('Pages.auth.forgot-password');
    }

    public function forgotPassword(UpdatePasswordRequest $request)
    {
        $validated = $request->validate();

        $status = Password::sendResetLink($validated);

        return $status === Password::ResetLinkSent
            ? response()->json(['status' => __($status)])
            : response()->json(['email' => __($status)]);
    }

    public function showResetPasswordForm(string $token)
    {
        $token = $token;
        return view('auth.reset-password', compact('token'));
    }
}
