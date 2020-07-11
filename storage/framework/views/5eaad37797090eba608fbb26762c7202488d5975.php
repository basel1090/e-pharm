<?php $__env->startSection("title", "Create Brand"); ?>



<?php $__env->startSection("content"); ?>
<div class="portlet light ">
        <div class="portlet-body form">
<form method="post" enctype="multipart/form-data" action="<?php echo e(route('brands.store')); ?>" role="form">

    <?php echo csrf_field(); ?>
               <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter your Brand Title">

                    </div>
                </div>

    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='<?php echo e(route("brands.index")); ?>'>Cancel</a>
    </div>
</form>
</div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/obaida/mywebsites/ggateway/e-pharm/resources/views/admin/brand/create.blade.php ENDPATH**/ ?>