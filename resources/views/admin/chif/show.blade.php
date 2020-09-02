@extends("layouts.admin")
@section("title", "Show Chif")
@section("content")


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Name</label>
                <input  type="text" disabled class="form-control" id="name" name="name" value="{{$chifes->name}}">
            </div>
            <div class="form-group">
                <label for="job">Job</label>
                <input class="form-control" disabled id="job" name="job" >{{$chifes->job}}>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                @if($chifes->image)
                    <img src='{{ asset("storage/".$chifes->image) }}' width='280' class='img-thumbnail' />
                @endif
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" {{$chifes->active?'checked' : ''}} >
                <label for="active">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href='{{route('chif.index')}}'>Back</a>
            </div>
        </div>
    </form>
@endsection
