<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserPostController;
use App\Mail\ConfirmationAccountMail;
use App\Models\User;

use Illuminate\Support\Facades\Route;


Route::get('/mailable', function () {
    $user = User::find(1);

    return new ConfirmationAccountMail($user);
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')
        ->name('auth.register.show');

    Route::post('/register', 'storeRegister')
        ->name('auth.register.store');

    Route::get('/login', 'showLoginForm')
        ->name('login');

    Route::post('/login', 'storeLogin')
        ->name('auth.login.store');

    Route::get('/logout', 'logout')
        ->name('auth.logout');

    Route::get('/email/verify', 'verifyEmailNotice')
        ->name('verification.notice')
        ->middleware('auth');

    Route::get('/email/verify/{id}/{hash}', 'verifyEmail')
        ->name('verification.verify')
        ->middleware(['auth', 'signed']);

    Route::post('/email/verification-notification', 'resendVerificationEmail')
        ->name('verification.send')
        ->middleware(['auth', 'throttle:6,1']);

    Route::get('/forgot-password', 'showChangePasswordForm')
        ->name('password.request')
        ->middleware('guest');

    Route::post('/forgot-password', 'forgotPassword')
        ->name('password.email')
        ->middleware('guest');

    Route::get('/reset-password/{token}', 'showResetPasswordForm')
        ->name('password.reset')
        ->middleware('guest');

    Route::post('/reset-password', 'resetPassword')
        ->name('password.update')
        ->middleware('guest');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', HomeController::class)->name('pages.home');

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/user/profile', 'show')
            ->name('pages.profile');

        Route::put('/user/update/{id}', 'update')
            ->name('user.update');
    });

    Route::controller(UserPostController::class)->group(function () {
        Route::get('/posts', 'show')->name('pages.posts');
    });
});
