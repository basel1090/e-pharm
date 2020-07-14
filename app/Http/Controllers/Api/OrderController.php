<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Product;

class OrderController extends Controller
{
    public function create(OrderRequest $request)
    {
        if(!$request->order_status_id){
            $request['order_status_id']=1;
        }
        Order::create($request->all());
    }
    public function index(){
        $orders=Order::leftJoin("users","user_id","users.id")
            ->leftJoin("products","product_id","products.id")
        -> where('order_status_id',2)->orderBy('id','DESC')
            ->select([
                'orders.id',
                'users.name as user',
                'products.title as category',
                'products.title as product',
                'quantity',
                'price',
                'total_price',

            ])->paginate(1);
//            ])->get();

        return $orders;
    }

}
