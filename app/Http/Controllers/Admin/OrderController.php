<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\User;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Request\Order\OrderRequest;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=request()->get("user_id");
        $price=request()->get("price");
        $product_id=request()->get("product_id");
        $order_status_id=request()->get("order_status_id");

        $orders = Order::whereRaw('true');
        if($user_id!=""){
            $orders->where('user_id',$user_id);
        }

        if($price) {
            $orders->where('price','like', "%$price%");
        }

        if($product_id != ""){
                $orders->where('product_id',$product_id);
            }

        if($order_status_id!=""){
            $orders->where('order_status_id',$order_status_id);
        }

        $status = OrderStatus::all();
        $users = User::all();

        $products=Product::orderBy('title')->get();
      $orders = $orders->paginate(5)->appends(["user_id"=>$user_id,
           "price"=>$price,
            "product_id"=>$product_id,
            "order_status_id"=>$order_status_id
        ]);

        return view("admin.order.index")->with("orders" , $orders)
                                                ->with("status" , $status)
                                                ->with("users" , $users)
                                                ->with("products" , $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
