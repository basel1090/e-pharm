<?php $__env->startSection("title","Edit Chif"); ?>


<?php $__env->startSection("content"); ?>

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('chif.update',$chifes->id)); ?>" role="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Name</label>
                        <input type="text" class="form-control" id="form_control_1" name="name"
                               value="<?php echo e($chifes->name); ?>" placeholder="Enter your Name">

                    </div>
                </div>

                <div class="form-group">
                    <label for="job">Job</label>
                    <input  class="form-control"  id="job"  name="job" <?php echo e($chifes->job); ?>>
                </div>
                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="imageFile" autofocus class="form-control" class="custom-file-input" id="imageFile">
                            <img src="<?php echo e(asset("storage/".$chifes->image)); ?>" width="150" class='img-thumbnail'>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name='active' value="<?php echo e(old('active')?? ""); ?>" class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='<?php echo e(route("chif.index")); ?>'>Cancel</a>
                </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/chif/edit.blade.php ENDPATH**/ ?>