

<?php $__env->startSection("title",  "Home"); ?>

<?php $__env->startSection("content"); ?>



<div class='alert alert-info'><b>Welcome <?php echo e(auth()->user()->name); ?> </b>Please select from left menu</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sora Sofyan\Desktop\e-pharm\e-pharm\resources\views/admin/home/index.blade.php ENDPATH**/ ?>