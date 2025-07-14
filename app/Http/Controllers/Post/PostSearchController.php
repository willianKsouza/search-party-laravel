<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostSearchRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostSearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validate = $request->validated();
        $posts = Post::whereLike('title', $validate['search']);
        
    }
}
