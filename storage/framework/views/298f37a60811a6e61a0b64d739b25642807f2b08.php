<?php $__env->startSection("title","Create New"); ?>


<?php $__env->startSection("content"); ?>

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('chif.store')); ?>" role="form">
                <?php echo csrf_field(); ?>
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Name</label>
                        <input type="text" class="form-control" id="form_control_1" name="name"
                               value="<?php echo e(old('name')); ?>" placeholder="Enter your Name">
                    </div>


                </div>

                <div class="form-group">
                    <label for="job">Job</label>
                    <input class="form-control"  id="job" value="<?php echo e(old('job')); ?>" name="job" >
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
                    <input type="checkbox" name='active' value="1" <?php echo e(old('active')?? ""); ?> class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='<?php echo e(route("about.index")); ?>'>Cancel</a>
                </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/chif/create.blade.php ENDPATH**/ ?>