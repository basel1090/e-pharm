<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

use App\Models\Product;
use App\User;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

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
        $orders=Order::orderBy('id','desc');

       $products=request()->get("products");
       $status=request()->get("status");
       $users=request()->get("users");

      
        if($status!=null){
            $orders->where('order_status_id',$status);
        }
        if($products){
            $orders->where('product_id',$products);
        }
        if($users){
            $orders->where('user_id',$users);
        }

        $statuses=OrderStatus::orderBy('title')->get();
        $products=Product::orderBy('title')->get();
        $users=User::orderBy('name')->get();


        $orders = $orders->paginate(5)->appends([

            "status"=>$status,
            "products"=>$products,
            "users"=>$users

            ]);

        return view('admin.order.index', compact(['orders','statuses','products','users']));
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
    public function approve($id){
        $order_approve=Order::find($id);
        $order_approve->update(['order_status_id'=>2]);
        session()->flash('msg','s: order has been approved');
        return redirect()->back();

    }
    public function cancel($id){
        $order_cancel=Order::find($id);
        $order_cancel->update(['order_status_id'=>3]);
        session()->flash('msg','w: order has been canceled');
        return redirect()->back();
    }
}
