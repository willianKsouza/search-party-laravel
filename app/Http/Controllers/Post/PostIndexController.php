<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::where('id', $id)
            ->select('id', 'title', 'body', 'created_at')
            ->with([
                'messages' => [
                    'user:id,user_name'
                ]
            ])
            ->with('categories:name')
            ->with(['participants' => function ($query) {
                $query->select('users.id', 'users.user_name')
                    ->orderByRaw('CASE WHEN users.id = ? THEN 0 ELSE 1 END', [Auth::user()->id]);
            }])
            ->first();

        if ($post) {
            return response()->json([
                'post' => $post
            ]);
        }

        return response()->json([
            'error' => 'post nao encontrado'
        ], 404);
    }
}
