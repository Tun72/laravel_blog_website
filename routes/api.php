<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/users", function () {
    try {
        if (request("is_admin") === "true") {
            return User::all();
        } else {
            return [
                "message" => "Access denied!",
                "status" => 200
            ];
        }
    } catch(Exception $e) {
        return [
            "message" => $e->getMessage(),
            "status" => 500
        ];
    }

});


Route::post("/users", function () {
    try {
        if (request("is_admin") === "true") {
            $cleanData = request()->validate([
                "name" => ["required"]
            ]);

            
        } else {
            return [
                "message" => "Access denied!",
                "status" => 200
            ];
        }
    } catch(Exception $e) {
        return [
            "message" => $e->getMessage(),
            "status" => 500
        ];
    }

});
