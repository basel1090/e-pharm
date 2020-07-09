<?php

namespace App\Http\Controllers;


use App\Models\Brand;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use  App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(\request()->all());
        $products = Product::get();
        return view('admin.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.product.create')->with('categories', $categories)->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request['active'] = $request['active'] ? 1 : 0;
        $request->file('image')->store('image');
        Product::create($request->all());
        session()->flash('msg', "s: product create successfully");
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $categories = Category::get();
        if ($products == null) {
            session()->flash('msg', 'w: this product not exist');
            return redirect(route('products.index'));
        } else {

            return view('admin.product.show')->with("products", $products)->with("categories", $categories);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            session()->flash("msg", "The Product was not found");
            return redirect(route("product.index"));
        }
        return view("admin.product.edit")->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if (!$request->published) {
            $request['published'] = 0;
        }
        Category::find($product)->update($request->all());
        session()->flash("msg", "The category was updated");
        return redirect(route("categories.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        Product::destroy($product);
        session()->flash("msg", "w:The Product Deleted");
        return redirect(route('products.index'));
    }
}