@extends("layouts.admin")
@section("title", "Show Product")
@section("content")


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" disabled class="form-control" id="title" name="title" value="{{$abouts->title}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" disabled id="description" name="description" >{{$abouts->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                @if($abouts->image)
                    <img src='{{ asset("storage/".$abouts->image) }}' width='280' class='img-thumbnail' />
                @endif
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" {{$abouts->active?'checked' : ''}} >
                <label for="active">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href='{{route('about.index')}}'>Back</a>
            </div>
        </div>
    </form>
@endsection
