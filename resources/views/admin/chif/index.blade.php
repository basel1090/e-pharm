@extends("layouts.admin")
@section("title", "Manage Chifes")
@section("content")

    <div class="table-scrollable">

        <a href="{{ route("chif.create")}}" class="btn btn-success btn-md"><i class='fa fa-plus'>
                Create New</i></a>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Name</th>
                <th> Image</th>
                <th> Job</th>
                <th> Any Status</th>
            </tr>
            </thead>
            <tbody>

            @foreach($chifes as $chif)
                    <tr>
                    <td> {{$chif->id}} </td>
                    <td> {{$chif->name}} </td>
                    <td width="20%">
                        <img src="{{asset("storage/".$chif->image)}}" class="img-responsive" alt="image not found" style="width:80px">
                    </td>
                    <td>{{$chif->job}}</td>
                    <td>
                        <form method="post" action="{{ route('chif.destroy', $chif->id) }}">
                            <a href="{{ route("chif.show", $chif->id) }}" class="btn btn-info btn-sm"><i
                                    class='fa fa-eye'></i></a>

                            <a href="{{ route("chif.edit", $chif->id) }}" class="btn btn-primary btn-sm"><i
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
