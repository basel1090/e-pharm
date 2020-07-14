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
    public function products(Request $request)
    {
        $name=request()->name;


        $products = Product::where('active',1)

            ->leftJoin("categories","category_id","categories.id")
            ->leftJoin("brands","brand_id","brands.id")
            ->select([
                'products.id',
                'brands.title as brand',
                'categories.title as category',
                'products.title as product',
                'image',
                'description',
                'old_price',
                'new_price',
            ]);//

        if($name){
            $products->where('products.title','like',"%{$name}%");
        }
        return  $products->paginate(2); ;
    }

    public function categories()
    {
        $categories = Category::where('published',1)->select('id','title'/*,'published'*/)->get();
        return $categories;
    }
}
