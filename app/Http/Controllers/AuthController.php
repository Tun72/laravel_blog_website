<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function getSignUpForm()
    {
        return view('auth.register');
    }

    public function register()
    {
        $cleanData =  request()->validate([
            "name" => ["required", "max:20"],
            "username" => ["required", "max:20", Rule::unique("users", "username")],
            "email" => ["required", "max:20", Rule::unique("users", "email")],
            "password" => ["required", "min:8"]
        ], [
            "name.max" => "Name shold not be more than 20 characters."
        ]);

        $user = User::create($cleanData);

        auth()->login($user);

        return redirect("/")->with("success", "Welcome from Blogs Website " . auth()->user()->name);
    }

    public function login()
    {
<<<<<<< HEAD
        request()->validate([
            "email" => ["required", Rule::exists("users", "email")],
=======
        
        request()->validate([
            "email" => ["required", "max:20"],
>>>>>>> 803ec328b54f94f64d8a37324f419e6b7f51516c
            "password" => ["required", "min:8"]
        ]);

        if (auth()->attempt([
            "email" => request("email"),
            "password" =>  request("password"),
        ])) {
            return redirect("/")->with("success", "Welcome from Blogs Website " . auth()->user()->name);
        } else {
            return redirect("/login")->withErrors(["error" => "Authantication Fail"])->withInput();
        }
    }

<<<<<<< HEAD

    // public function login()
    // {

    //     request()->validate([
    //         "email" => ["required", "max:20"],
    //         "password" => ["required", "min:8"]
    //     ]);

    //     $user = User::where("email", request("email"))->first();

    //     if($user) {
    //         if(Hash::check(request("password"), $user->password)) {
    //             auth()->login($user);
    //             return redirect("/")->with("success", "Welcome from Blogs Website " . auth()->user()->name);
    //         } else {
    //             return redirect("/login")->withErrors(["password" => "your passsword is wrong"]);
    //         }
    //     } else {
    //         return redirect("/login")->withErrors(["email" => "email does not exit"]);
    //     }
    // }

=======
>>>>>>> 803ec328b54f94f64d8a37324f419e6b7f51516c
    public function logout() {
        auth()->logout();
        return redirect("/")->with("success", "SuccessFully logout!");    
    }
<<<<<<< HEAD

=======
>>>>>>> 803ec328b54f94f64d8a37324f419e6b7f51516c
}
