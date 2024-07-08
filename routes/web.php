<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;

Route::prefix("")->group(function () {
    Route::get("", [HomeController::class, "index"])->name("home.index");
});

Route::prefix("brands")->group(function () {
    Route::get("", [BrandsController::class, "index"])->name("brands.index");
    Route::get("new", [BrandsController::class, "create"])->name("brands.create");
    Route::post("", [BrandsController::class, "store"])->name("brands.store");
    Route::delete("delete/{id}", [BrandsController::class, "delete"])->name("brands.delete");
    Route::get("{id}", [BrandsController::class, "edit"])->name("brands.edit");
});

Route::prefix("categories")->group(function () {
    Route::get("", [CategoriesController::class, "index"])->name("categories.index");
    Route::get("new", [CategoriesController::class, "create"])->name("categories.create");
    Route::post("", [CategoriesController::class, "store"])->name("categories.store");
    Route::delete("delete/{id}", [CategoriesController::class, "delete"])->name("categories.delete");
    Route::get("{id}", [CategoriesController::class, "edit"])->name("categories.edit");
});

Route::prefix("products")->group(function () {
    Route::get("", [ProductsController::class, "index"])->name("products.index");
    Route::get("new", [ProductsController::class, "create"])->name("products.create");
    Route::post("", [ProductsController::class, "store"])->name("products.store");
    Route::delete("delete/{id}", [ProductsController::class, "delete"])->name("products.delete");
    Route::get("{id}", [ProductsController::class, "edit"])->name("products.edit");
    Route::get("stock/{id}", [ProductsController::class, "editStock"])->name("products.editStock");
    Route::post("", [ProductsController::class, "stock"])->name("products.stock");
});