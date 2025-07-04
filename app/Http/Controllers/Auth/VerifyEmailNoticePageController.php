<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyEmailNoticePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('pages.auth.verify-email-notice');
    }
}
