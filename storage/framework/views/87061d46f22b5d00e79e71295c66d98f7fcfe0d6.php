<?php $__env->startSection("title", "Show Product"); ?>
<?php $__env->startSection("content"); ?>


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Name</label>
                <input  type="text" disabled class="form-control" id="name" name="name" value="<?php echo e($chifes->name); ?>">
            </div>
            <div class="form-group">
                <label for="job">Job</label>
                <input class="form-control" disabled id="job" name="job" ><?php echo e($chifes->job); ?>>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                <?php if($chifes->image): ?>
                    <img src='<?php echo e(asset("storage/".$chifes->image)); ?>' width='280' class='img-thumbnail' />
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" <?php echo e($chifes->active?'checked' : ''); ?> >
                <label for="active">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href='<?php echo e(route('chif.index')); ?>'>Back</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/chif/show.blade.php ENDPATH**/ ?>