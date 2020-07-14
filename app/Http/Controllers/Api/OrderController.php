<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Controllers\Controller;
use App\User;

class OrderController extends Controller
{
    public function create (OrderRequest $request)
    {
       if(!$request->order_status_id){
           $request['order_status_id'] = 1;
       }

       Order::create($request->all());
    }

    public function index(){
        $orders=Order::leftJoin("users","user_id","users.id")
            ->leftJoin("products","product_id","products.id")
            ->leftJoin("order_statuses","order_status_id","order_statuses.id")
            ->where('order_status_id',2)
            ->select([
                'users.name as user',
                'products.title as product',
                'quantity',
                'price',
                'total_price',
            ])->get();
        return $orders;
    }


}
