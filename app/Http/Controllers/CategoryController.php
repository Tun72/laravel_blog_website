<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index() {
        return view("category.index", [
            "categories" => Category::all()
        ]);

    }

    public function store() {
        return view("category.store");
    }

    public function insert() {
        $cleanData = request()->validate([
            "name" => ["required", "max:20"],
            "slug"=> ["required", "max:20"],
        ]);

        Category::create($cleanData);

        return redirect("/blog/categories");
    }

    public function edit(Category $category) {
        return view("category.edit", [
            "category" => $category
        ]);
    }

    public function update(Category $category){
        $cleanData = request()->validate([
            "name" => ["required", "max:20"],
            "slug"=> ["required", "max:20"],
        ]);

        $category->update($cleanData);

        return redirect("/blog/categories");
    }


    public function destory(Category $category) {
        // dd($category);
       $category->delete();
       return redirect("/blog/categories");
    }


}
