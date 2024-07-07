<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Brand;

class BrandsController extends Controller
{
    public function index() {
        $brands = Brand::all();

        return view("brands", [
            "brands" => $brands
        ]);
    }

    public function create() {
        $brand = new Brand();

        return view("brand", [
            "brand" => $brand
        ]);
    }

    public function edit($id) {
        $brand = Brand::find($id);

        return view("brand", [
            "brand" => $brand
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required",
        ], [
            "name.required" => "O campo nome deve ser preenchido",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($request->input("id")) {
            $id = $request->input("id");

            $brand = Brand::find($id);
            $brand->name = $request->input("name");

            if($request->file("photo")) {
                $nameFile = uniqid() . "." . $request->file("photo")->extension();
                $request->file("photo")->storeAs("public", $nameFile);
                $brand->photo = $nameFile;
            }
            
            $brand->save();

            return redirect()->route("brands.index");
        }

        $brand = new Brand();
        if($request->file("photo")) {
            $nameFile = uniqid() . "." . $request->file("photo")->extension();
            $request->file("photo")->storeAs("public", $nameFile);
            $brand->photo = $nameFile;
        }
        $brand->name = $request->input("name");
        $brand->save();

        return redirect()->route("brands.index");
    }

    public function delete($id) {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route("brands.index");
    }
}
