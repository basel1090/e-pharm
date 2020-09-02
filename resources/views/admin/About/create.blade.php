@extends("layouts.admin")

@section("title","Create New")


@section("content")

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="{{ route('about.store') }}" role="form">
                @csrf
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title"
                               value="{{old('title')}}" placeholder="Enter your Title">
                    </div>


                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control"  id="description" value="{{old('description')}}" name="description" ></textarea>
                </div>
                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile"> Choose Image</label>
                        <div class="custom-file">
                            <input type="file"  autofocus class="form-control" name="imageFile" class="custom-file-input" id="imageFile">
                        </div>
                    </div>
                </div>




                <div class="form-check">
                    <input type="checkbox" name='active' value="1" {{old('active')?? ""}} class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='{{ route("about.index") }}'>Cancel</a>
                </div>
@endsection
