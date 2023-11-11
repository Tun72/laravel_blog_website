<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', "intro", "body", "photo", "reading_time", "category_id", "user_id"];
    // protected $guard = ["id"];

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($query) {
            if (File::exists($file = public_path($query->photo))) {
                File::delete($file);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function subscribers()
    {
        return $this->belongsToMany(User::class, "user_blog"); // if (User::class, blogs_users)
    }


    public function scopeFilter($blogQuery, $filters)
    {
        if ($search = $filters["search"] ?? null) {
            $blogQuery->where(function ($blogQuery) use ($search) {
                $blogQuery->where("title", "LIKE", "%" . $search . "%")->orWhere("intro", "LIKE", "%" . $search . "%");
            });
        }
        if ($category = $filters["category"] ?? null) {

            $blogQuery = $blogQuery->whereHas("category", function ($catQuery) use ($category) {
                $catQuery->where("slug", $category);
            });
        }
        if ($author =  $filters['author'] ?? null) {
            $blogQuery->whereHas("user", function ($authorQuery) use ($author) {
                $authorQuery->where("username", $author);
            });
        }

        // return $blogQuery;
    }
}

// a user many blog
// a blog a user
