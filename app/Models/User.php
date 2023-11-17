<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // aappend 
    protected $appends = ["realName"];



    public static function boot() {
         parent::boot();
         static::deleted(function($query){
            if (File::exists($file = public_path($query->photo))) {
                File::delete($file);
            }

            if(count($query->blogs)) {
                $query->blogs->delete();
            }

            
         });
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    protected function setPasswordAttribute($value) {
        $this->attributes["password"] = bcrypt($value);
    }

    public function getUsernameAttribute($value) {
        return ucfirst($value);
    }

    public function getRealNameAttribute($value) {
        return $this->name . " " . $this->username;
    }

    public function blogs() {
          return $this->hasMany(Blog::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function subscribedBlogs() {
        return $this->belongsToMany(Blog::class, "user_blog");
    }

    public function isSubscribed($blog) {
        return $this->subscribedBlogs->contains("id", $blog->id);
    }

    public function notifications() {
        return $this->hasMany(Notification::class, "recipient_id");
    }

    public function getCountNotifications() {
        return count($this->notifications()->where("is_seen",  0)->get());
    }
}
