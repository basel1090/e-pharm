<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

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
        /*$products = Product::where('active',1)
        //عملنا فنكشن بلمودل بدالهم
        //->leftJoin("categories","category_id","categories.id")
        //->leftJoin("brands","brand_id","brands.id")
        ->select([
            'products.id',
            'brands.title as brand',
            'categories.title as category',
            'products.title as product',
            'image',
            'old_price',
            'new_price',
            'description',

        ])->paginate(3);
        return $products;*/
        //عشان السيرش
        $q=request()->q;
        $category=request()->category;
        $brand=request()->brand;
        $products = Product::where('active',1);
        if($q){
            $products->where("products.title","like","%{$q}%");
        }
        if($category){
            $products->where("category.title",$category);
        }
        if($brand){
            $products->where("brand.title",$brand);
        }
        $products=$products->paginate(3);
        return $products;


    }


}
