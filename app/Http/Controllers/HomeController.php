<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostSearchRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class HomeController extends Controller
{


    public function __invoke(PostSearchRequest $request)
    {
        /** @var \Illuminate\Http\Request $request */

        $validate = $request->validated();

        $search = $request->input('search', '');

        $categories = Category::all();

        $posts_query = Post::query();

        $array_slugs = null;

        if ($request->query('search')) {
            $singular = Str::singular($request->query('search'));

            $plural = Str::plural($request->query('search'));

            $posts_query->where('title', 'LIKE', "%{$singular}%")
                ->orWhere('title', 'LIKE', "%{$plural}%");
        }
        if ($request->query('category')) {

            $slug = $request->query('category');

            $array_slugs = explode(',', $slug);
           
            $posts_query->OrWhereHas('categories', function (Builder $query) use ($slug) {
                $query->WhereIn('slug', explode(',', $slug));
            });
        }
        
        $posts = $posts_query->get();
      


        return view('pages.home', compact('categories', 'posts', 'array_slugs'))
            ->with('search', $search);
    }
}
