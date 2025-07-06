<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        return view('pages.home', compact('categories'));
    }
}
