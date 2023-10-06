<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'blogs' =>   Blog::with('category')->with("user")->latest()->get()  //all() other must use get()
    ]);
});

// Route::get('/blogs/{blog:slug}', function (Blog $blog) { //route model 
//     return view('blog', [
//         'blog' => $blog
//     ]);
// });

Route::get('/blogs/{blog:slug}', function (Blog $blog) { //route model 
    return view('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]);
});

Route::get("/categories/{category:slug}", function(Category $category) {
    return view(('home'), [
        'blogs' => $category->blogs->load("category")->load("user")
    ]);
});

Route::get("/users/{user:username}", function(User $user) {
    return view(('home'), [
        'blogs' => $user->blogs->load("user")->load("category")
    ]);
});