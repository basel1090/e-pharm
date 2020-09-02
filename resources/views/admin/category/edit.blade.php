@extends("layouts.admin")

@section("title","Edit Category")


@section("content")


<form method="post" enctype="multipart/form-data" action="{{ route('categories.update', $category->id) }}" role="form">
@csrf
@method("PATCH")
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input value='{{old('title')??$category->title}}'  type="text" autofocus class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter Category Name">
                  </div>

                    <div class="form-group row">
                        <div class='col-sm-6'>
                            <label for="imageFile">Image</label>
                            <div class="custom-file">
                                <input type="file" name="imageFile" autofocus class="form-control" class="custom-file-input" id="imageFile">
                            </div>
                        </div>
                    </div>

                    <div>
                        <img src="{{asset("storage/".$category->image)}}" width='240' class='img-thumbnail'>

                    </div>

                  <div class="form-check">
                    <input {{ (old('published')??$category->published)?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Published</label>
                  </div>



                <!-- /.card-body -->

                <div >
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-danger' href='{{ asset("admin/categories") }}'>Cancel</a>
                </div>
              </form>
@endsection
