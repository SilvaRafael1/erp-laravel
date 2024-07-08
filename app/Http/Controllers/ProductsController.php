<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all();

        return view("products", [
            "products" => $products
        ]);
    }

    public function create() {
        $product = new Product();
        $brands = Brand::all();
        $categories = Category::all();

        return view("product", [
            "product" => $product,
            "brands" => $brands,
            "categories" => $categories
        ]);
    }

    public function edit($id) {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();

        return view("product", [
            "product" => $product,
            "brands" => $brands,
            "categories" => $categories
        ]);
    }
    
    public function editStock($id) {
        $product = Product::find($id);

        return view("productStock", [
            "product" => $product,
        ]);
    }

    public function stock(Request $request) {
        $validator = Validator::make($request->all(), [
            "quantidade" => "required",
            "attStock" => "required"
        ], [
            "quantidade.required" => "O campo quantidade deve ser preenchido",
            "attStock.required" => "Deve ser selecionado uma ação a ser feita",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $id = $request->input("id");
        $product = Product::find($id);
        $quantidade = $request->input("quantidade");
        $acao = $request->input("attStock");

        switch($acao) {
            case "entrada":
                $product->stock += $quantidade;
                $product->save();
                break;
            case "saida":
                $product->stock -= $quantidade;
                $product->save();
                break;
            case "balanco":
                $product->stock = $quantidade;
                $product->save();
                break;
        }

        return redirect()->route("products.index");
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "price" => "required",
        ], [
            "name.required" => "O campo nome deve ser preenchido",
            "description.required" => "O campo descrição deve ser preenchido",
            "price.required" => "O campo preço deve ser preenchido",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if($request->input("id")) {
            $id = $request->input("id");

            $product = Product::find($id);
            $product->name = $request->input("name");
            $product->description = $request->input("description");
            $product->price = $request->input("price");
            $product->brand_id = $request->input("brand_id");
            $product->category_id = $request->input("category_id");

            if($request->file("photo")) {
                $nameFile = uniqid() . "." . $request->file("photo")->extension();
                $request->file("photo")->storeAs("public", $nameFile);
                $product->photo = $nameFile;
            }
            
            $product->save();

            return redirect()->route("products.index");
        }

        $product = new Product();
        if($request->file("photo")) {
            $nameFile = uniqid() . "." . $request->file("photo")->extension();
            $request->file("photo")->storeAs("public", $nameFile);
            $product->photo = $nameFile;
        }
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->stock = 0;
        $product->price = $request->input("price");
        $product->brand_id = $request->input("brand_id");
        $product->category_id = $request->input("category_id");
        $product->save();

        return redirect()->route("products.index");
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route("products.index");
    }
}
