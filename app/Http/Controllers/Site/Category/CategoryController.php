<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(){
    return view("frontend/product/shop");
  }
  public function shop(){
    return view("frontend/product/shop");
  }
  public function contact(){
    return view("frontend/contact/contact");
  }
//       Route::get("/danh-muc/{slug}.html",[SiteCategoryController::class,"index"]);
//       Route::get("/san-pham",[SiteProductController::class,"shop"]);
//       Route::get("/san-pham/{slug}.html",[SiteProductController::class,"details"]);
//       Route::get("/san-pham/tim-kiem",[SiteProductController::class,"filter"]);
 }
