<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function shop(){
    return view("frontend/product/shop");
  }
  public function filter(){
    return view("frontend/product/shop");
  }
  public function details(){
    return view("frontend/product/detail");
  }
}
