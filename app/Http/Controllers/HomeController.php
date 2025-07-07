<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('pages.home', compact('categories','posts'));
    }
}
