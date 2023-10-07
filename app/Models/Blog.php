<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', "intro", "body"];
    // protected $guard = ["id"];

    public function category() {
        return $this->belongsTo(Category::class); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($blogQuery, $filters) {
        if ($search = $filters["search"] ?? null) {
            $blogQuery->where("title", "LIKE", "%" . $search . "%")->orWhere("intro", "LIKE", "%" . $search . "%");
        }
        if($category = $filters["search"] ?? null) {
            $blogQuery->whereHas("category", function($catQuery) use($category) {
                  $catQuery->where("slug", $category);
            });
        }

        // return $blogQuery;
    }
}

// a user many blog
// a blog a user


