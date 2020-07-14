
<?php $__env->startSection("title", "Edit User"); ?>

<?php $__env->startSection("content"); ?>
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route("users.update", $users->id)); ?>">

        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>


    <div class="form-group">
        <label for="name">name</label>
        <input  type="text" value="<?php echo e($users->name); ?>" autofocus class="form-control" id="name" name="name" placeholder="Enter your name">
    </div>



    <div class="form-group">
        <label for="email">email</label>
        <input  type="email" value="<?php echo e($users->email); ?>" class="form-control"  id="email" name="email" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input  type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>




    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
        <a class='btn btn-default' href='<?php echo e(route("users.index")); ?>'>Cancel</a>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Desktop\pharm\e-pharm\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>