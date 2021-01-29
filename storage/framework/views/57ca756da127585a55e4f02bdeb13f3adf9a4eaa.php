

<?php $__env->startSection("title", "Create user"); ?>

<?php $__env->startSection("content"); ?>
<form method="post" enctype="multipart/form-data" action="<?php echo e(route('users.store')); ?>" role="form">
    <?php echo csrf_field(); ?>

    <div class="card-body">

            <div class="form-group">
                <label for="name">name</label>
                <input  type="text" value="<?php echo e(old('name')); ?>" autofocus class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>



            <div class="form-group">
                <label for="email">email</label>
                <input  type="email" value="<?php echo e(old('email')); ?>" class="form-control"  id="email" name="email" placeholder="Enter email">
            </div>

        <div class="form-group">
            <label for="password">password</label>
            <input  type="password" value="<?php echo e(old('password')); ?>" autofocus class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>




        <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>

        <a class='btn btn-default' href='<?php echo e(route("users.index")); ?>'>Cancel</a>
    </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-pharm\resources\views/admin/user/create.blade.php ENDPATH**/ ?>