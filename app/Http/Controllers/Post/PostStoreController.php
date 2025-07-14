<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(PostStoreRequest $request)
    {
        $validate = $request->validated();

        $post = Post::create([
            'title' => $validate['title'],
            'body' => $validate['body'],
            'slug' => $validate['title'],
            'user_id' => Auth::user()->id
        ]);
        
        $post->categories()->attach($validate['categories']);

        $post->participants()->syncWithoutDetaching([Auth::user()->id]);
        
        return response()->noContent();
    }
}
