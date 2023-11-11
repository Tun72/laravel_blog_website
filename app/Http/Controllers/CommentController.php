<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\subscriberMail;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog, CommentRequest $request)
    {

        $blog->comments()->create([
            "body" => request("body"),
            "user_id" => auth()->user()->id
        ]);

        $subscribers = $blog->subscribers->filter(fn ($user) => $user->id != auth()->user()->id);
        
       
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new subscriberMail($blog, $subscriber->name));
        }
        return back()->with("success", "Successfully Inserted !");;
    }

    public function update(Comment $comment, CommentRequest $request)
    {
        $comment->update([
            "body" => request("body")
        ]);

        return back()->with("success", "Successfully Updated !");
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return back()->with("success", "Successfully Deleted !");
    }
}
