<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::where('id', $id)
            ->select('id', 'title','body','created_at')
            ->with('messages')
            ->with('categories')
            ->with('participants')
            ->get();
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
