<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFormRequest;
use App\Models\Category;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function getBlogs()
    {
        return view('blogs.index', [
            'blogs' => Blog::with(["user", "category"])->filter(request(["search", "category", "author"]))->latest()->paginate(9)->withQueryString(),
            //all() other must use get()
        ]);
    }


    public function show(Blog $blog)
    {

        return view('blogs.show', [
            'blog' => $blog->load("comments"),
            'randomBlogs' => cache()->remember('blogs' . $blog->slug, now()->addSeconds(10), function () use ($blog) {

                return $blog->category === null ? [] : Blog::inRandomOrder()->whereHas('category', function ($query) use ($blog) {
                    $query->where('slug', $blog->category->slug);
                })->take(3)->get();
            })
        ]);
    }


    public function create()
    {
        return view("blogs.create", [
            "categories" => Category::all()
        ]);
    }

    public function edit(Blog $blog)
    {
        return view("blogs.update", [
            "categories" => Category::all(),
            "blog" => $blog
        ]);
    }

    public function update(BlogFormRequest $request, Blog $blog)
    {

        // 1
        // if(!Gate::allows("blog-action", $blog)) {
        //     abort(403);
        // }

        //2
        // if(Gate::denies("blog-action", $blog)) {
        //     abort(403);
        // }

        //3
        // $this->authorize("blog-create", $blog);

        $this->authorize("edit", $blog);

        $cleanData = $request->validated();

        $blog->title = $cleanData["title"];
        $blog->body = $cleanData["body"];
        $blog->category_id = $cleanData["category_id"];
        $blog->slug = $cleanData["slug"];
        $blog->reading_time = $cleanData["reading_time"];
        $blog->intro = $cleanData["intro"];

        if ($file = request("photo")) {

            if ($path = public_path($blog->photo)) {
                File::delete($path);

            }
            $blog->photo = "/storage/" . $file->store("/blogs");
        }

        $blog->update();
        $subscribers = $blog->getSubscribers();

        foreach ($subscribers as $subscriber) {

            $noti = Notification::create([
                "type" => "update",
                "user_id" => auth()->user()->id,
                "recipient_id" => $subscriber->id,
                "blog_id" => $blog->id
            ]);

            $noti->save();
        }


        return redirect("/admin");
    }
    public function insert(BlogFormRequest $request)
    {
        $cleanData = $request->validated();

        $cleanData["user_id"] = auth()->id();
        $cleanData["photo"] = "/storage/" . request("photo")->store("/blogs");

        // dd($cleanData);



        $blog = Blog::create($cleanData);

        foreach (User::where("id", "!=", auth()->id())->get() as $user) {

            $noti = Notification::create([
                "type" => "create",
                "user_id" => auth()->user()->id,
                "recipient_id" => $user->id,
                "blog_id" => $blog->id
            ]);

            $noti->save();
        }
        return redirect("/admin");
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
