<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordFormController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $token)
    {
        $token = $token;

        return view('pages.auth.reset-password', compact('token'));
    }
}
