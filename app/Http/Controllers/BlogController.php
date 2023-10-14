<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function getBlogs()
    {
        return view('blogs.index', [
            'blogs' =>  Blog::with(["user", "category" ])->filter(request(["search", "category", "author"]))->latest()->paginate(9)->withQueryString(),
             //all() other must use get()
        ]);
    }

    public function show(Blog $blog) {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => cache()->remember('blogs' . $blog->slug, now()->addSeconds(10), function() use($blog) {

                return Blog::inRandomOrder()->whereHas('category', function($query) use($blog){
                  $query->where('slug', $blog->category->slug);
                })->take(3)->get();
            })
        ]);
    }
}
