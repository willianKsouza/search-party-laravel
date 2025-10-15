<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        Gate::authorize('delete', $post);
        
        $post->delete();

        return redirect()->route('pages.home');
    }
}
