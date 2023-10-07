<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, "getBlogs"]);

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
        'blogs' => $category->blogs->load(["user", "category"]),
        'category' => Category::all()
    ]);
});

Route::get("/users/{user:username}", function(User $user) {
    return view(('home'), [
        'blogs' => $user->blogs->load(["user", "category"]),
        'category' => Category::all()
    ]);
});