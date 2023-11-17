<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        // Model::unguard();

        Gate::define("blog-action", function (User $user, Blog $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define("user-comment", function (User $user, Comment $comment) {
            return $user->id === $comment->user_id;
        });
    }
}
