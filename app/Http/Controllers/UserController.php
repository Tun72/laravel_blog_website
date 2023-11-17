<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return view("user.index");
    }

    public function edit()
    {
        return view("user.edit");
    }

    public function update()
    {

        $user = User::find(auth()->id());
        $cleanData = request()->validate([
            "name" => ["required", "max:20"],
            "email" => ["required", "max:30"],
            "username" => ["required", "max:20"],
            "photo" => ["image"]
        ]);

        if ($file = request("photo")) {
            if ($path = public_path($user->photo)) {
                File::delete($path);
            }

            $cleanData["photo"] = "/storage/" . $file->store("/userImages");
        }

        // dd(
        //  $cleanData
        // );
        $user->update($cleanData);


        return redirect("/user/profile");
    }

    public function destory()
    {
        $user = User::find(
            auth()->id()
        );

        auth()->logout();

        $user->delete();

        return redirect("/");
    }

    public function all()
    {
        return view("user.all", [
            "users" => USer::where("id", "!=", auth()->id())->latest()->paginate(10)
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect("/users");
    }

    public function setToAdmin(User $user)
    {

        $user->admin = 1;
        $user->update();
        return redirect("/users");
    }
}
