<?php $__env->startSection("title", "Create Blog"); ?>

<?php $__env->startSection("css"); ?>
<link href="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="portlet light ">
        <div class="portlet-body form">
<form method="post" enctype="multipart/form-data" action="<?php echo e(route('blogs.store')); ?>" role="form">
    <?php echo csrf_field(); ?>
               <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter your Title">

                    </div>
                </div>
    </div>

    <div class="form-group row">
        <div class='col-sm-6'>
            <label for="imageFile">Image</label>
            <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
            </div>
        </div>
    </div>

     <div class="form-body">
            <div class="form-group has-success">
               <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" name="comment"><?php echo e(old('comment')); ?></textarea>
            </div>
    </div>
    <div class="form-group">
        <label for="details">Details</label>
        <textarea class="form-control" id="details" name="details"><?php echo e(old('details')); ?></textarea>
    </div>


    <div class="form-check">
        <input <?php echo e(old('published')?"checked":""); ?> value='1' type="checkbox" name='published' class="form-check-input" id="published">
        <label class="form-check-label" for='published'>Published</label>
    </div>
    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='<?php echo e(route("blogs.index")); ?>'>Cancel</a>
    </div>
</form>
</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<!-- <script src="<?php echo e(asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script> -->
    <script type="text/javascript">
    /*$(document).ready(function () {
      bsCustomFileInput.init();
    });*/
    </script>

<script src="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js')); ?>" type="text/javascript"></script>
<script>
$("#details").summernote({height:300});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>