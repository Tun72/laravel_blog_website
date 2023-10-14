<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, "getBlogs"]);
Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);


// Auth 
Route::get("/login", [AuthController::class, "getLoginForm"]);
Route::get("/register", [AuthController::class, "getSignUpForm"]);

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/logout", [AuthController::class, "logout"]);


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