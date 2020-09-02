@extends("layouts.admin")
@section("title", "Manage Products")
@section("content")

    <div class="table-scrollable">

        {{--        @if($abouts->count()>0)--}}
        <a href="{{ route("about.create")}}" class="btn btn-success btn-md"><i class='fa fa-plus'>
                Create New</i></a>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Title</th>
                <th> image</th>
                <th> description</th>
                <th> Any Status</th>
            </tr>
            </thead>
            <tbody>

            @foreach($abouts as $about)
                    <tr>
                    <td> {{$about->id}} </td>
                    <td> {{$about->title}} </td>
                    <td width="20%">
                        <img src="{{asset("storage/".$about->image)}}" class="img-responsive" alt="image not found" style="width:80px">
                    </td>
                    <td>{{$about->description}}</td>
                    <td>
                        <form method="post" action="{{ route('about.destroy', $about->id) }}">
                            <a href="{{ route("about.show", $about->id) }}" class="btn btn-info btn-sm"><i
                                    class='fa fa-eye'></i></a>

                            <a href="{{ route("about.edit", $about->id) }}" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>


                            <button onclick='return confirm("Are you sure ?")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")


                    </form>
                    </td>
</tr>
            @endforeach

            </tbody>
        </table>


    {{--    @endif--}}

@endsection
