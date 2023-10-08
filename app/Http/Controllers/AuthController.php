<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function getLoginForm() {
        return view('auth.login');
    }

    public function getSignUpForm() {
        return view('auth.register');
    }
}
