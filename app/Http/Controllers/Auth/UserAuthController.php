<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function showRegisterForm() {}

    public function showLoginForm() {}

    public function storeLogin($request) {}

    public function logout(Request $request) {}

    public function verifyEmailNotice() {}

    public function verifyEmail(EmailVerificationRequest $request) {}

    public function sendVerificationEmail(Request $request) {}

    public function showChangePasswordForm(Request $request) {}

    public function forgotPassword() {}

    public function showResetPasswordForm() {}

    public function resetPassword(Request $request) {}
}
