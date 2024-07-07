<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view("categories", [
            "categories" => $categories
        ]);
    }

    public function create() {
        $category = new Category();

        return view("category", [
            "category" => $category
        ]);
    }

    public function edit($id) {
        $category = Category::find($id);

        return view("category", [
            "category" => $category
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required"
        ], [
            "name.required" => "O campo nome deve ser preenchido",
            "description.required" => "O campo descrição deve ser preenchido",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($request->input("id")) {
            $id = $request->input("id");

            $category = Category::find($id);
            $category->name = $request->input("name");
            $category->description = $request->input("description");
            $category->save();

            return redirect()->route("categories.index");
        }

        $category = new Category();
        $category->name = $request->input("name");
        $category->description = $request->input("description");
        $category->save();

        return redirect()->route("categories.index");
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route("categories.index");
    }
}
