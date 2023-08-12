<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
  public function index(){
    return view("frontend/index");
  }
  public function about(){
    return view("frontend/about/about");
  }
  public function contact(){
    return view("frontend/contact/contact");
  }
    
}
