@extends("layouts.admin")

@section("title","Edit Chif")


@section("content")

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="{{ route('chif.update',$chifes->id) }}" role="form">
                @csrf
                @method("PUT")
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Name</label>
                        <input type="text" class="form-control" id="form_control_1" name="name"
                               value="{{$chifes->name}}" placeholder="Enter your Name">

                    </div>
                </div>

                <div class="form-group">
                    <label for="job">Job</label>
                    <input  class="form-control"  id="job"  name="job" {{$chifes->job}}>
                </div>
                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="imageFile" autofocus class="form-control" class="custom-file-input" id="imageFile">
                            <img src="{{asset("storage/".$chifes->image)}}" width="150" class='img-thumbnail'>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name='active' value="{{old('active')?? ""}}" class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='{{ route("chif.index") }}'>Cancel</a>
                </div>
@endsection


