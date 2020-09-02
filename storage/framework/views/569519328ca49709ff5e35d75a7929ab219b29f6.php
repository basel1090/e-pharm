<?php $__env->startSection("title", "Edit Blog"); ?>

<?php $__env->startSection("css"); ?>
    <link href="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="portlet light ">
        <div class="portlet-body form">
<form role="form" method="post" enctype="multipart/form-data" action="<?php echo e(route('blogs.update', $blogs->id)); ?>" role="form">
    <?php echo csrf_field(); ?>
    <?php echo method_field("put"); ?>

               <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="text" class="form-control" id="form_control_1" name="title" value="<?php echo e($blogs->title); ?>">
                        <label for="form_control_1">Title</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>

                 <div class="form-body">
                      <div class="form-group has-success">
                      <label for="comment">Comment</label>
                      <textarea class="form-control" id="comment" name="comment"><?php echo e(old('comment')); ?></textarea>
                  </div>
                  </div>

                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <textarea class="form-control" id="details" name="details"><?php echo e($blogs->details); ?></textarea>
                        <label for="form_control_1">Details</label>
                        <span class="help-block">Typing...</span>
                    </div>
                </div>
              <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="file" name="imageFile" class="form-control custom-file-input" id="form_control_1">
                        <label for="form_control_1">Image</label>
                    </div>
                    <div>
                     <?php if($blogs->image): ?>
                        <img src="<?php echo e(asset("storage/".$blogs->image)); ?>" width='240' class='img-thumbnail'>
                     <?php endif; ?>
                    </div>
                </div>
               <div class="md-checkbox-inline">
                    <div class="md-checkbox">
                        <input type="checkbox" id="checkbox6" class="md-check" name="published" value="1" <?php echo e((old('published')?? $blogs->published)?"checked":""); ?>>
                        <label for="checkbox6">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Published </label>
                    </div>
                </div>

              <div class="form-actions noborder">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a type="reset" href="<?php echo e(route('blogs.index')); ?>" class="btn default">Cancel</a>
                </div>
           </form>
        </div>
     </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script src="<?php echo e(asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          bsCustomFileInput.init();
        });
    </script>

    <script src="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-summernote/summernote.min.js')); ?>" type="text/javascript"></script>
    <script>
        $("#details").summernote({height:300});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>