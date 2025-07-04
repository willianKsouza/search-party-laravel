<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangePasswordFormController;
use App\Http\Controllers\Auth\ForgotPasswordStoreController;
use App\Http\Controllers\Auth\LoginFormController;
use App\Http\Controllers\Auth\LoginStoreController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterFormController;
use App\Http\Controllers\Auth\RegisterStoreController;
use App\Http\Controllers\Auth\ResetPasswordFormController;
use App\Http\Controllers\Auth\ResetPasswordStoreController;
use App\Http\Controllers\Auth\VerificationSendEmailController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\VerifyEmailNoticePageController;
use App\Http\Controllers\User\ChangePasswordStoreController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\User\UserProfilePageController;
use App\Http\Controllers\User\UserProfileUpdateController;
use App\Mail\ConfirmationAccountMail;
use App\Models\User;

use Illuminate\Support\Facades\Route;



Route::get('/mailable', function () {
    $user = User::find(1);

    return new ConfirmationAccountMail($user);
});

Route::get('/', HomeController::class)
    ->middleware('auth', 'verified')
    ->name('pages.home');

// Register Routes
Route::get('/register', RegisterFormController::class)
    ->name('auth.register.show');

Route::post('/register', RegisterStoreController::class)
    ->name('auth.register.store');
// Fim Register Routes

// Email Verification Routes
Route::get('/email/verify', VerifyEmailNoticePageController::class)
    ->name('verification.notice')
    ->middleware('auth');

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->name('verification.verify')
    ->middleware(['auth', 'signed']);

Route::post('/email/verification-notification', VerificationSendEmailController::class)
    ->name('verification.send')
    ->middleware(['auth', 'throttle:6,1']);
// FIM Email Verification Routes

// Login Routes
Route::get('/login', LoginFormController::class)
    ->name('login');

Route::post('/login', LoginStoreController::class)
    ->name('auth.login.store');
// Fim Login Routes

Route::get('/logout', LogoutController::class)
    ->name('auth.logout');

// Change Password Routes
Route::get('/forgot-password', ChangePasswordFormController::class)
    ->name('password.request')
    ->middleware('guest');

Route::post('/forgot-password', ForgotPasswordStoreController::class)
    ->name('password.email')
    ->middleware('guest');

Route::get('/reset-password/{token}', ResetPasswordFormController::class)
    ->name('password.reset')
    ->middleware('guest');

Route::post('/reset-password', ResetPasswordStoreController::class)
    ->name('password.update')
    ->middleware('guest');

Route::post('/change-password', ChangePasswordStoreController::class)
    ->name('password.change.store')
    ->middleware('auth');
// FIM Change Password Routes

// User Profile Routes
Route::get('/user/profile', UserProfilePageController::class)
    ->middleware('auth', 'verified')
    ->name('pages.profile');

Route::put('/user/update/{id}', UserProfileUpdateController::class)
    ->middleware('auth', 'verified')
    ->name('user.update');
// FIM User Profile  Routes

Route::controller(UserPostController::class)->group(function () {
    Route::get('/posts', 'show')->name('pages.posts')->middleware('auth', 'verified');
});
