<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function getBlogs()
    {
        return view('home', [
            'blogs' =>  Blog::with(["user", "category"])->filter(request(["search", "category"]))->latest()->paginate(10)  //all() other must use get()
        ]);
    }
}
