<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::where('id', $id)->with('messages')->get();
        if ($post) {
            return response()->json([
                'post' => $post
            ]);
        }
        return response()->json([
            'error' => 'post nao encontrado'
        ],404);
    }
}
