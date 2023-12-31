<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Mail\subscriberMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


// route grouping 
// Route::middleware(AuthMiddleware::class)->group(function () {
//     Route::get('/', [BlogController::class, "getBlogs"]);
//     Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);
// });

// Route::get('/', (function () {
//     Mail::to("test@gmail.com")->queue(new subscriberMail("hello"));
//     Mail::to("test1@gmail.com")->queue(new subscriberMail("hello"));
//     Mail::to("test2@gmail.com")->queue(new subscriberMail("hello"));
//     dd("email send");
// }))->middleware('auth');



Route::get('/', [BlogController::class, "getBlogs"])->middleware('auth');
Route::get('/blogs/{blog:slug}', [BlogController::class, "show"])->middleware(["auth", "seen"]);

// admin
Route::middleware([AdminMiddleware::class, AuthMiddleware::class])->group(function () {
    Route::get("/admin", [AdminController::class, "index"]);
    Route::get("/blog/blog-create", [BlogController::class, "create"]);

    Route::delete("/blogs/{blog:slug}/delete", [BlogController::class, "delete"]);
    Route::post("/blog/blog-create", [BlogController::class, "insert"]);

    Route::get("/blog/{blog}/blog-update", [BlogController::class, "edit"])->can("edit", 'blog');
    // ->can("blog-action", "blog");
    Route::patch("/blog/{blog}/blog-update", [BlogController::class, "update"]);


    // categoory

    Route::get("/blog/categories", [CategoryController::class, "index"]);
    Route::get("/category/store", [CategoryController::class, "store"]);

    Route::post("/category/store", [CategoryController::class, "insert"]);

    Route::get("/category/{category:id}/update", [CategoryController::class, "edit"]);
    Route::patch("/category/{category:id}/update", [CategoryController::class, "update"]);

    Route::delete("/category/{category:id}/delete", [CategoryController::class, "destory"]);

    // users
    Route::get("/users", [UserController::class, "all"]);
    Route::patch("/users/{user:id}/set-to-admin", [UserController::class, "setToAdmin"]);
    Route::delete("/users/{user:id}/delete-user", [UserController::class, "delete"]);
    
});


// Auth 
Route::get("/login", [AuthController::class, "getLoginForm"]);
Route::get("/register", [AuthController::class, "getSignUpForm"]);

Route::patch("/register", [AuthController::class, "getSignUpForm"]);


Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/logout", [AuthController::class, "logout"]);

Route::post("/logout", [AuthController::class, "logout"]);

// subscribe 
Route::post("/blogs/{blog:slug}/subscribe", [subscribeController::class, "handelSubscription"]);
// comment
Route::middleware(AuthMiddleware::class)->group(function () {
    Route::post("/blogs/{blog:slug}/comments", [CommentController::class, "store"]);
    Route::post("/comments/{comment:id}/update", [CommentController::class, "update"])->middleware("comment")->can("user-comment", 'comment');
    Route::post("/comments/{comment:id}/delete", [CommentController::class, "delete"])->can("user-comment", 'comment');


    //user
   
    Route::get("/user/profile", [UserController::class, "index"]);
    Route::get("/user/edit", [UserController::class, "edit"]);
    Route::patch("/user/edit", [UserController::class, "update"]);
    Route::delete("/user/delete", [UserController::class, "destory"]);
});






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


// policy