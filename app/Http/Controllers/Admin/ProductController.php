<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use  App\Http\Requests\ProductRequest;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public  $search ;
    public function index()
    {

        $products = Product::orderBy('id');

        $this->search = [
            'name' =>\request()->get('name') ,
            'category' => \request()->get('category') ,
            'brand' => \request()->get('brand') ,
            'active' => \request()->get('active')
        ];

//        $category_id = Category::where('title' , 'like' , "%{$search['category']}%")->first('id')->id ?? "";
//        $brand_id = Category::where('title' , 'like' , "%{$search['brand']}%")->first('id')->id ?? "";

        if ($this->search['name']){
            $products->where('title' , 'like' , "%{$this->search['name']}%");
        }
        if ($this->search['category']){
            $products->whereHas('category' ,function ($query ){
                $query->where('title' , 'like' , "%{$this->search['category']}%");
            });
        }
        if ($this->search['brand']){
            $products->whereHas('brand' ,function ($query ){
                $query->where('title' , 'like' , "%{$this->search['brand']}%");
            });
        }
        if ($this->search['active'] != null){
            $products->where('active' , $this->search['active']);
        }
        $products = $products->paginate(10)->appends($this->search);
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
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
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

        $categories = Category::all();
        $brands = Brand::all();
        if($product==null){
            session()->flash("msg", "The Product was not found");
            return redirect(route("product.index"));
        }
        return view("admin.product.edit")->withProduct($product)->withCategories($categories)->withBrands($brands);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,  $id)
    {
        if (!$request->active) {
            $request['active'] = 0;
        }
        Product::find($id)->update($request->all());
        session()->flash("msg", "The Product was updated");
        return redirect(route("products.index"));

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
