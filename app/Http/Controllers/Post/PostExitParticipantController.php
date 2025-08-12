<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostExitParticipantController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::find($id);

        $post->participants()->detach(Auth::user()->id);

        return $post
            ? back()->with('status', 'voce saiu do post com sucesso.')
            : back()->with('status', 'ocorreu um erro.');
    }
}
