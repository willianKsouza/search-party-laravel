<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateUserRequest $request, string $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);

        $user->user_name = $validated['user_name'];

        $user->email = $validated['email'];

        $user->save();

        return back()
            ->with('success', 'Profile updated successfully.');
    }
}
