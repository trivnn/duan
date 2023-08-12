<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController as SiteCategoryController;
use App\Http\Controllers\Site\Product\ProductController as SiteProductController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TestController;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/test", [TestController::class, "test1"]); // Định tuyến cho URL "/test" đến phương thức "test1" của lớp TestController

Route::group(["prefix" => "/login", "middleware" => "checklogin"], function () { // Nhóm các định tuyến có tiền tố URL là "/login" và áp dụng middleware "checklogin"
    Route::get("/", [AuthController::class, "getLogin"]); // Định tuyến cho URL "/login" (GET) đến phương thức "getLogin" của lớp AuthController
    Route::post("/", [AuthController::class, "postLogin"]); // Định tuyến cho URL "/login" (POST) đến phương thức "postLogin" của lớp AuthController
});
// ROUTER SITE
Route::get("/", [SiteController::class,"index"]);
Route::get("/ve-chung-toi",[SiteController::class,"about"]);
Route::get("/lien-he",[SiteController::class,"contact"]);
Route::get("/danh-muc/{slug}.html",[SiteCategoryController::class,"index"]);
Route::get("/san-pham",[SiteProductController::class,"shop"]);
Route::get("/san-pham/{slug}.html",[SiteProductController::class,"details"]);
Route::get("/san-pham/tim-kiem",[SiteProductController::class,"filter"]);
Route::get("/giohang",[CartController::class,"cart"]);
Route::get("/giohang/them-hang",[CartController::class,"addToCart"]);
Route::get("/giohang/cap-nhat-gio-hang/{id}/{qty}",[CartController::class,"update"]);
Route::get("/giohang/xoa-hang/{id}",[CartController::class,"delete"]);
Route::get("/giohang/thanh-toan.html",[CartController::class,"checkout"]);
Route::get("/giohang/thanh-toan",[CartController::class,"payment"]);
Route::get("/giohang/hoan-thanh",[CartController::class,"complete"]);






//ROUTER ADMIN
Route::group(["prefix" => "admin", "middleware" => "checkadmin"], function () { // Nhóm các định tuyến có tiền tố URL là "admin" và áp dụng middleware "checkadmin"

    Route::get("/", [AdminController::class, "index"]); // Định tuyến cho URL "admin/" đến phương thức "index" của lớp AdminController
    Route::get("/logout", [AdminController::class, "logout"]); // Định tuyến cho URL "admin/logout" đến phương thức "logout" của lớp AdminController

    Route::group(["prefix" => "product"], function () { // Nhóm các định tuyến có tiền tố URL là "admin/product"
        Route::get("/", [ProductController::class, "index"]); // Định tuyến cho URL "admin/product/" đến phương thức "index" của lớp ProductController
        Route::get("/create", [ProductController::class, "create"]); // Định tuyến cho URL "admin/product/create" đến phương thức "create" của lớp ProductController
        Route::post("/store", [ProductController::class, "store"]); // Định tuyến cho URL "admin/product/store" đến phương thức "store" của lớp ProductController
        Route::get("/edit/{id}", [ProductController::class, "edit"]); // Định tuyến cho URL "admin/product/edit/{id}" đến phương thức "edit" của lớp ProductController
        Route::post("/update/{id}", [ProductController::class, "update"]); // Định tuyến cho URL "admin/product/update/{id}" đến phương thức "update" của lớp ProductController
        Route::get("/delete/{id}", [ProductController::class, "delete"]); // Định tuyến cho URL "admin/product/delete/{id}" đến phương thức "delete" của lớp ProductController
    });
});

