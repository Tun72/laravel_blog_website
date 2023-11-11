<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class subscribeController extends Controller
{
    //

    public function handelSubscription(Blog $blog)
    {
        $user = User::find(auth()->id());

        if ($user->isSubscribed($blog)) {
            $user->subscribedBlogs()->detach($blog->id);
        } else {
            $user->subscribedBlogs()->attach($blog->id);
        }

        return back();
    }
}
