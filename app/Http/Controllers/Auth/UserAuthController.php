<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserAuthController extends Controller
{
    public function showRegisterForm()
    {
      
    }

    public function showLoginForm()
    {
       
    }

    public function storeLogin( $request)
    {

    }

    public function logout(Request $request)
    {
   
    }

    public function verifyEmailNotice()
    {
        
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {

    }

    public function sendVerificationEmail(Request $request)
    {

    }

    public function showChangePasswordForm(Request $request)
    {
        
    }

    public function forgotPassword()
    {
 
    }

    public function showResetPasswordForm()
    {
       
    }


    public function resetPassword(Request $request)
    {

      
    }
}
