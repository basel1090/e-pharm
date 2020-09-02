<?php $__env->startSection("title", "Show Product"); ?>
<?php $__env->startSection("content"); ?>


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" disabled class="form-control" id="title" name="title" value="<?php echo e($abouts->title); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" disabled id="description" name="description" ><?php echo e($abouts->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                <?php if($abouts->image): ?>
                    <img src='<?php echo e(asset("storage/".$abouts->image)); ?>' width='280' class='img-thumbnail' />
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" <?php echo e($abouts->active?'checked' : ''); ?> >
                <label for="active">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href='<?php echo e(route('about.index')); ?>'>Back</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/About/show.blade.php ENDPATH**/ ?>