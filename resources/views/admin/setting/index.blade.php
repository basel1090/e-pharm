@extends("layouts.admin")
@section("title", "Manage Setting")
@section("content")

    <div class="table-scrollable">

        {{--        @if($abouts->count()>0)--}}
        <a href="{{ route("setting.create")}}" class="btn btn-success btn-md"><i class='fa fa-plus'>
                Create New</i></a>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Logo</th>
                <th> Facebook</th>
                <th> Instagram</th>
                <th> Twitter</th>
                <th> Status</th>
            </tr>
            </thead>
            <tbody>

            @foreach($setting as $NewSetting)
                    <tr>
                    <td> {{$NewSetting->id}} </td>
                    <td> {{$NewSetting->logo}} </td>
                    <td>{{$NewSetting->facebook}}</td>
                    <td>{{$NewSetting->instagram}}</td>
                    <td>{{$NewSetting->twitter}}</td>
                    <td>{{$NewSetting->active}}</td>
                    <td>
                        <form method="post" action="{{ route('setting.destroy', $NewSetting->id) }}">
                            <a href="{{ route("setting.show", $NewSetting->id) }}" class="btn btn-info btn-sm"><i
                                    class='fa fa-eye'></i></a>

                            <a href="{{ route("setting.edit", $NewSetting->id) }}" class="btn btn-primary btn-sm"><i
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
