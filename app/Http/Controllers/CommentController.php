<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\subscriberMail;
use App\Models\Notification;

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


        $subscribers = $blog->getSubscribers();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new subscriberMail($blog, $subscriber->name));
            $noti = Notification::create([
                "type" => "comment",
                "user_id" => auth()->user()->id,
                "recipient_id" => $subscriber->id,
                "blog_id" => $blog->id
            ]);

            $noti->save();
        }


        return back()->with("success", "Successfully Inserted !");

    }

    public function update(Comment $comment, CommentRequest $request)
    {
         $this->authorize("user-comment", $comment);
        $comment->update([
            "body" => request("body")
        ]);

        return back()->with("success", "Successfully Updated !");
    }
    public function delete(Comment $comment)
    {
        $this->authorize("user-comment", $comment);
        $comment->delete();
        return back()->with("success", "Successfully Deleted !");
    }
}
