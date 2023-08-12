<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use App\Models\User;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Category;
use App\Vietpro\Vietpro;

class TestController extends Controller
{
    //
    public function test(Request $request){

      
        dd(Vietpro::getDataVietpro());

        // $products=Product::find(5)
        // // ->detail()
        // ->toArray();
        // dd($products);
    //    $categories = Category::all()
    //    ->toArray();
   
    // function showCategory($categories, $parent, $char){
    //     foreach($categories as $category){
    //         if($category["parent"] == $parent){
    //             echo $char.$category["name"]."<br/>";
    //             $newParent = $category["id"];
    //             showCategory($categories, $newParent, $char."|--");
    //         }
    //     }
    // }
    
    // showCategory($categories, 0, "");
    
        
        
    }
    public function test1(Request $request){
        dd($request->session()->all());
        // return view("test");

    }
    public function testForm(Request $request){
        $rules = [
            "email"=>"email|required",
            "password"=>"required|min:3|max:6",
        ];
        $messages = [
            "email.required"=>"Email không được để trống!",
            "email.email"=>"Email không hợp lệ!",
            "password.required"=>"Password không được để trống!",
            "password.min"=>"Password tối thiểu 3 ký tự!",
            "password.max"=>"Password tối đa 6 ký tự!",
        ];
        $request->validate($rules, $messages);
    }
}
