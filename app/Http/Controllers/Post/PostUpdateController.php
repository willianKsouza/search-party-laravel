<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\Post\PostUpdateRequest $request
     * @param string $id
     */
    public function __invoke(PostUpdateRequest $request, string $id)
    {
        $validate = $request->validated();

        $post = Post::find($id);

        Gate::authorize('update', $post);
        
        if ($post) {
            $post->fill($validate);

            $post->save();

            return response()->noContent();
        } else {
            return response()->json([
                'message' => 'Post not found.',
            ], 404);
        }
    }
}
