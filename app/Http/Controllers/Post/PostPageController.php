<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all();

        $array_slugs = null;

        $posts_query = Post::where('user_id', Auth::user()->id);

        if ($request->query('category')) {
            $slug = $request->query('category');

            $array_slugs = explode(',', $slug);

            $posts_query->WhereHas('categories', function (Builder $query) use ($slug) {
                $query->WhereIn('slug', explode(',', $slug));
            });
        }

        $posts = $posts_query->get();

        return view('pages.posts', compact('posts', 'categories', 'array_slugs'));
    }
}
