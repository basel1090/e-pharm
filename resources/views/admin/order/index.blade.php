@extends("layouts.admin")
@section("title", "Manage Orders")
@section("content")

            <form class='row'>
             <div class="col-sm-2">
                    <select name="product_id"  class="form-control">
                        <option value=''>Any Product</option>
                        @foreach($products as $product)
                            <option {{ $product->id==request()->get('product_id')?"selected":""}} value='{{ $product->id}}'>{{ $product->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2">
                    <select name="user_id"  class="form-control">
                        <option value=''>Any Customer</option>
                        @foreach($users as $user)
                            <option {{ $user->id==request()->get('user_id')?"selected":""}} value='{{ $user->id}}'>{{ $user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2">
                   <select name= "order_status_id" class="form-control">
                        <option value="">Any status</option>--}}
                       <option value='{{request()->get("order_status_id")?"selected":""}}'>Pendding</option>
                        <option value='{{request()->get("order_status_id")?"selected":""}}' >Done</option>
                        <option value='{{request()->get("order_status_id")?"selected":""}}' >Cancel</option>
                    </select>
                </div>
                <div class='col-sm-2'>
                    <input type='text' value='{{ request()->get("price") }}' class="form-control" placeholder="enter price to search"
                           name="price"/>
                </div>

                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>search</button>
                </div>
            </form>

{{--        <div class="col-2">--}}

{{--            <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>--}}
{{--        </div>--}}
    @if($orders->count()>0)
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th> Customer name</th>
                <th> Product</th>
                <th> Quantity</th>
                <th> PRICE</th>
                <th>Total Price</th>
                <th>Status</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->total_price}}</td>
                    <td>{{ $order->order_status_id}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}

        {{--{{->links()}}--}}

@else
        <div class="alert alert-warning">Sorry, there is no results to your search</div>
@endif
@endsection
