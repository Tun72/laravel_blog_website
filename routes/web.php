<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, "getBlogs"]);

Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);

// Route::get("/categories/{category:slug}", function(Category $category) {
//     return view(('home'), [
//         'blogs' => $category->blogs()->with(["user", "category"])->paginate(9),
//         'category' => Category::all()
//     ]);
// });

// Route::get("/users/{user:username}", function(User $user) {
//     return view(('home'), [
//         'blogs' => $user->blogs()->with(["user", "category"])->paginate(9),
//         'category' => Category::all()
//     ]);
// });