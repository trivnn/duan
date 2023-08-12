<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy("id", "DESC")->paginate(5);

        // dd($products);


        // $products = DB::table('products')
        //     ->join("categories", "products.categories_id", "=", "categories.id")
        //     ->select(
        //         "products.id",
        //         "image",
        //         "code",
        //         "products.name as products_name",
        //         "price",
        //         "state",
        //         "categories.name as categories_name"
        //     )
        //     ->orderBy("id", "DESC")
        //     ->get()
        //     ->toArray();
        return view("backend/products/listproduct", ["products" => $products]);
    }
    public function create()
    {



        

        // dd($slug);

        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories" => $categories]);
    }
    public function store(AddProductRequest $AddProductRequest)
    {
        if($AddProductRequest->hasFile("image")){

            $file = $AddProductRequest->image;
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = $file->getRealPath();
            $file->move("uploads", Slug::getSlug($AddProductRequest->name).".".$fileExtension);
        }

        $product = new Product();
        $product->name = $AddProductRequest->name;
        $product->code = $AddProductRequest->code;
        $product->slug = Slug::getSlug($AddProductRequest->name);
        $product->info = $AddProductRequest->info;
        $product->describer = $AddProductRequest->describer;
        $product->image = Slug::getSlug($AddProductRequest->name).".".$fileExtension;
        $product->price = $AddProductRequest->price;
        $product->featured = $AddProductRequest->featured;
        $product->state = $AddProductRequest->state;
        $product->categories_id = $AddProductRequest->categories_id;
        $product->save();

        $AddProductRequest->session()->flash("alert", "Đã thêm thành công !");

        return redirect("/admin/product");
    }
    public function edit($id)
    {
        
        $categories = Category::all()->toArray();
        $product = Product::where("id", $id)->get()->toArray();
        return view("backend/products/editproduct", ["product"=>$product[0], "categories"=>$categories]);
    }
    public function update(EditProductRequest $EditProductRequest, $id)
    {
        $product = Product::find($id);
        $product->name = $EditProductRequest->name;
        $product->code = $EditProductRequest->code;
        $product->slug = Slug::getSlug($EditProductRequest->name);
        $product->info = $EditProductRequest->info;
        $product->describer = $EditProductRequest->describer;
        // $product->image = Slug::getSlug($EditProductRequest->name).".".$fileExtension;
        $product->price = $EditProductRequest->price;
        $product->featured = $EditProductRequest->featured;
        $product->state = $EditProductRequest->state;
        $product->categories_id = $EditProductRequest->categories_id;

        if($EditProductRequest->hasFile("image")){

            $file = $EditProductRequest->image;
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = $file->getRealPath();
            $file->move("uploads", Slug::getSlug($EditProductRequest->name).".".$fileExtension);

            $product->image = Slug::getSlug($EditProductRequest->name).".".$fileExtension;
        }

        $product->save();

        $EditProductRequest->session()->flash("alert", "Đã sửa thành công !");
        return redirect("/admin/product");
    }
    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash("alert", "Đã xóa thành công !");
        return redirect("/admin/product");
    }
}
