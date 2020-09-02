@extends("layouts.admin")

@section("title","Create New")


@section("content")

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="{{ route('setting.store') }}" role="form">
                @csrf
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Logo</label>
                        <input type="text" class="form-control" id="form_control_1" name="logo"
                               value="{{old('logo')}}" placeholder="Enter your Logo">
                    </div>


                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input  class="form-control"  id="facebook" value="{{old('facebook')}}" name="facebook" >

                </div><div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input  class="form-control"  id="instagram" value="{{old('instagram')}}" name="instagram" >

                </div><div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input  class="form-control"  id="twitter" value="{{old('twitter')}}" name="twitter" >

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
