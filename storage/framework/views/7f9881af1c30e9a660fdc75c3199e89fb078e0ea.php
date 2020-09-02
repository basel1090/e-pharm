<?php $__env->startSection("title","Edit Product"); ?>


<?php $__env->startSection("content"); ?>

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('about.update',$abouts->id)); ?>" role="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title"
                               value="<?php echo e($abouts->title); ?>" placeholder="Enter your Title">

                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control"  id="description"  name="description" ><?php echo e($abouts->description); ?></textarea>
                </div>
                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="imageFile" autofocus class="form-control" class="custom-file-input" id="imageFile">
                            <img src="<?php echo e(asset("storage/".$abouts->image)); ?>" width="150" class='img-thumbnail'>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name='active' value="<?php echo e(old('active')?? ""); ?>" class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='<?php echo e(route("about.index")); ?>'>Cancel</a>
                </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/About/edit.blade.php ENDPATH**/ ?>