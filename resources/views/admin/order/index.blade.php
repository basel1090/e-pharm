@extends("layouts.admin")
@section("title", "Manage order")
@section("content")
<div class="portlet light ">

                            <form class="portlet-body">
                                <div class='row'>
                                    <div class="col-sm-3">
                                      <select name="product" class="form-control">
                                     <option value=''>Any Product</option>
                                      @foreach($products as $product)
                                        <option {{$product->id==request()->get('product')?"selected":""}} value='{{$product->id}}'>{{$product->title}}</option>
                                     @endforeach
                             </select>
                                    </div>
                                      <div class="col-sm-3">
                                      <select name="user" class="form-control">
                                      <option value=''>Any User</option>
                                    @foreach($users as $user)
                                        <option {{$user->id==request()->get('user')?"selected":""}} value='{{$user->id}}'>{{$user->name}}</option>
                                    @endforeach
                             </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <select name="status" class="form-control">
                                    <option value=''>Any Status</option>
                                  @foreach($statuses as $status)
                                        <option {{ $status->id==request()->get('status')?"selected":"" }} value='{{ $status->id }}'>{{ $status->title }}</option>
                                  @endforeach
                            </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                                       
                                    </div>
                                    </div>
                                </form>
                                <hr>
                                    @if($orders->count()>0)
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th> Product </th>
                                                    <th> User</th>
                                                    <th> Quantity </th>
                                                    <th> Price </th>
                                                    <th> Total Price </th>
                                                    <th> Order status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>

                                                <td>{{ $order->product->title }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->total_price }}</td>
                                                <td>{{ $order->orderStatus->title }}</td>
                                                  
                                                    <td>
                                                        @if($order->order_status_id==1)
                                                            <a href="{{route('order.approve',$order->id)}}" style="width: 80px" class="btn btn-success btn-sm" >Approve</a>
                                                            <a href="{{route('order.cancel',$order->id)}}" style="width: 80px" class="btn btn-success btn-sm" >Cancel</a>
                                                        @else
                                                            <span>{{ $order->orderStatus->title }}</span>
                                                        @endif               </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

{{ $orders->links() }}
@else
    <div class='alert alert-warning'>Sorry, there is no results to your search</div>
@endif
                                </div>

                            </div>

@endsection
