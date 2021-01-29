<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Requests\Order\ChangePasswordRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Order\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Product;
use App\Http\Controllers\Auth;


class OrderController extends Controller
{
    public function create (OrderRequest $request)
    {
       if(!$request->order_status_id){
           $request['order_status_id'] = 1;
       }
       //get logged user from access_token
       $request['user_id'] = $request->user()->id;

       $product = Product::find($request['product_id']);
       $request['price'] = $product->new_price??$product->old_price;

       $request['total_price'] = $request['quantity'] * $request['price'];
       $order = Order::create($request->all());
       return $order;
    }

    public function index(){
        /*$orders=Order::leftJoin("products","product_id","products.id")
            ->leftJoin("order_statuses","order_status_id","order_statuses.id")
            ->where("user_id", request()->user()->id)
            ->select([
                'orders.id',
                'products.id as product_id',
                'products.title as product',
                'quantity',
                'price',
                'total_price',
            ])->orderBy("orders.id","desc")->paginate();*/

        $orders = Order::where("user_id", request()->user()->id)
        ->paginate(10);
        return $orders;
    }

    public function destroy($id){
    $order = Order::find($id);
    if($order && $order->order_status_id==1 && $order->user_id == request()->user()->$id){

        Order::destroy($id);
        return response()->json(["msg"=>"The Order Deleted Successfuly"]);
        }
      else{
            return response()->json(["msg"=>"The Order Not Found"]);

           }
    }
    public function postChangePassword(ChangePasswordRequest $request){
        $hasher = app('hash');
        if ($hasher->check($request->current_password, auth()->user()->password)) {
            // Success
            $order = Order::find(auth()->user()->id);
            $order->update(['password'=>bcrypt($request->new_password)]);
            session()->flash("msg", "s:Password updated Successfully");
            return response()->json(["msg"=>"The Order Change Password Successfuly"]);
        }
        else{
            session()->flash("msg", "e:Invalid Current Password");
            return response()->json(["msg"=>"The Order Invalid"]);
        }
    }

    public function signout() {
        auth()->user()->token()->revoke();
        return response()->json(["msg"=>"SigOut Successfuly"]);
    }

}
