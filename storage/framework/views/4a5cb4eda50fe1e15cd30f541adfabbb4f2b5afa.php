

<?php $__env->startSection("title",  "Home"); ?>

<?php $__env->startSection("content"); ?>



<div class='alert alert-danger'><b>Error </b>You don't have access  to requested link</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/home/no-access.blade.php ENDPATH**/ ?>