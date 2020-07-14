<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
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

//    public function products()
//    {
//        $products = Product::where('active',1)->get();
//        return $products;
//    }

    public function products()
   {
       $q = request()->q;
       $category = request()->category;
       $brand = request()->brand;

       $products = Product::where('active',1)
       ->leftJoin("brands","brand_id","brands.id")
       ->leftJoin("categories","category_id","categories.id")
           ->select([
               'products.id',
               'products.title as product',
               'brands.title as brand',
               'categories.title as category',
               'image',
               'description',
               'old_price'
                   ])->get();
       if ($q){
           $products->where("products.title","like","%{$q}%");
       }
       return $products;

   }

}
