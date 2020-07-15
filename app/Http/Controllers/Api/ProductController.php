<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Product\CreateRequest;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\editRequest;

use App\Models\Brand;
use App\Models\Category;


class ProductController extends Controller
{
    public function brands()
    {
        $brands = Brand::select('id','title')->get();
        return $brands;
    }


    public function categories()
    {
        $categories = Category::where('published',1)->select('id','title'/*,'published'*/)->get();
        return $categories;
    }
    public function products()
    {
        $q = request()->q;
        $category = request()->category;
        $brand = request()->brand;

        /*$products = Product::where('active',1)
        ->leftJoin("brands","brand_id","brands.id")
        ->leftJoin("categories","category_id","categories.id");

        if($q){
            $products->where("products.title","like","%{$q}%");
        }
        if($category){
            $products->where("category_id",$category);
        }
        if($brand){
            $products->where("brand_id",$brand);
        }

        $products = $products->select([
            'products.id',
            'brands.title as brand',
            'brand_id',
            'categories.title as category',
            'category_id',
            'products.title as product',
            'image',
            'description',
            'old_price',
            'new_price'
        ])->paginate(10);*/


        $products = Product::where('active',1);
        if($q){
            $products->where("title","like","%{$q}%");
        }
        if($category){
            $products->where("category_id",$category);
        }
        if($brand){
            $products->where("brand_id",$brand);
        }
        $products = $products->paginate(10);
        return $products;
    }
    public function createproduct(CreateRequest $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        Product::create($request->all());
        return response()->json(["msg"=>"product create successfully"]);
        }




}
