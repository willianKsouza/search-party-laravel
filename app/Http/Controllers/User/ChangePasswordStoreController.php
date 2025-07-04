<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password, [
                'rounds' => 12,
            ]);

            $user->save();
            return redirect()->route('pages.profile')->with('status', 'Senha alterada com sucesso.');
        }

        return back()->withErrors(['current_password' => 'Senha atual incorreta.']);
    }
}
