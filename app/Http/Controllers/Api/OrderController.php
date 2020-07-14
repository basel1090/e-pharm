<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    
    public function myorder()
    {
        $orders = Order::select([
                        'product_id',
                        'quantity',
                        'price',
                        'total_price' ])
        ->get();
        return $orders;
    }
    public function AddOrder(OrderRequest $request)
    {
        if(!$request->order_status_id){
             $request['order_status_id']=1;
        }
        $request['user_id']=$request->user()->id;

        $products=Product::find( $request['product_id']);
        $request['price']=$products->new_price??$products->old_price;

        $request['total_price']=$request['quantity']*$request['price'];

        $orders = Order::create($request->all());
    
        return $orders;
    }
    
}
