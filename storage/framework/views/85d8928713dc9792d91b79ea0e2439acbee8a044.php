<?php $__env->startSection("title","Edit Category"); ?>


<?php $__env->startSection("content"); ?>


<form method="post" enctype="multipart/form-data" action="<?php echo e(route('categories.update', $category->id)); ?>" role="form">
<?php echo csrf_field(); ?>
<?php echo method_field("PATCH"); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input value='<?php echo e(old('title')??$category->title); ?>'  type="text" autofocus class="<?php echo e($errors->has('title')?"is-invalid":""); ?> form-control" id="title" name="title" placeholder="Enter Category Name">
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
                        <img src="<?php echo e(asset("storage/".$category->image)); ?>" width='240' class='img-thumbnail'>

                    </div>

                  <div class="form-check">
                    <input <?php echo e((old('published')??$category->published)?"checked":""); ?> value='1' type="checkbox" name='published' class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Published</label>
                  </div>



                <!-- /.card-body -->

                <div >
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-danger' href='<?php echo e(asset("admin/categories")); ?>'>Cancel</a>
                </div>
              </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>