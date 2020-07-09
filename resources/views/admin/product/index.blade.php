@extends("layouts.admin")
@section("title", "Manage Products")
@section("content")

    <form class='row'>
        <div class='col-sm-6'>
            <input type='text' class="form-control" placeholder="enter your search"
                   name="q"/></div>
        <div class='col-sm-2'>
            <select name='published' class='form-control'>
                <option value=''>Any status</option>
                <option {{request()->get("published")?"selected":""}} value='1'>Active</option>
                <option {{request()->get("published")=='0'?"selected":""}} value='0'>InActive</option>
            </select></div>
        <div class='col-sm-2'>
            <button type='submit' class='btn btn-primary'><i class="fa fa-search"></i>search</button>
        </div>
        <div class="col-2">

            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>
    </form>
    @if($products->count()>0)
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th> #</th>
                <th> title</th>
                <th> old_price</th>
                <th>new_price</th>
                <th> size</th>
                <th>image</th>
                <th> description</th>
                <th>category_id</th>
                <th>brand_id</th>
                <th>active</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><a href="{{ route('products.show' , $product->id) }}">{{ $product->title }}</a></td>
                    <td>{{ $product->old_price }}</td>
                    <td>{{ $product->new_price }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->image }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->brand->title}}</td>
                    <td>
                        <input type="checkbox" disabled {{ $product->active?"checked" : "" }}>
                    </td>



                    <td width="20%">
                        <form method="post" action="{{ route('products.destroy', $product->id) }}">

                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>
                            <button onclick='return confirm("Are you sure??")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class='alert alert-warning'>Sorry, there is no results to your search</div>

    @endif
@endsection