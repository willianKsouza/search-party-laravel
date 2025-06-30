<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class UserProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        return view('pages.profile', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);

        $user->user_name = $validated['user_name'];

        $user->email = $validated['email'];

        $user->save();

        return response()->noContent();
    }


}
