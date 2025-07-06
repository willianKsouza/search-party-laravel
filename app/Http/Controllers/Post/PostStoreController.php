<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Post;

class PostStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PostStoreRequest $request)
    {
        $validate = $request->validated();
        
        $post = Post::create([
            'title' => $validate->title,
            'body' => $validate->body,
        ]);

        $post->categories->attach($validate['categories']);

        return redirect()->route('pages.home');
    }
}
