<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::find($id)->delete();
        
        return $post
            ?  back()->with('status', 'post deletado com sucesso.')
            : back()->with('status', 'ocorreu um erro.');
    }
}
