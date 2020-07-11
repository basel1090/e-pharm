<?php $__env->startSection("title", "Show Product"); ?>
<?php $__env->startSection("content"); ?>


    <form  role="form">

        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" disabled class="form-control" id="title" name="title" value="<?php echo e($products->title); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" disabled id="description" name="description" ><?php echo e($products->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="old_price">Old Price</label>
                <input  type="text" disabled class="form-control" id="old_price" name="old_price" value="<?php echo e($products->old_price); ?>">
            </div>
            <div class="form-group">
                <label for="comment">New Price</label>
                <input  type="text" disabled class="form-control" id="new_price" name="new_price" value="<?php echo e($products->new_price); ?>">            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input  type="number"  class="form-control" disabled id="size" name="size" value="<?php echo e($products->size); ?>">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                <?php if($products->image): ?>
                    <img src='<?php echo e(asset("storage/".$products->image)); ?>' width='280' class='img-thumbnail' />
                <?php endif; ?>
            </div>
            <div class="form-group">
                <select class="form-control <?php echo e($errors->has('category_id')?'is-invalid':''); ?>" id="exampleFormControlSelect1" name="category_id" id="category_id"  >
                    <option value="">Select The Category..</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(old('category_id')?"selected":""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <input  type="checkbox" disabled  id="active" name="active" <?php echo e($products->active?'checked' : ''); ?> >
                <label for="published">Active</label>

            </div>
            <div>

                <a class='btn btn-danger' href=''>Back</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/obaida/mywebsites/ggateway/e-pharm/resources/views/admin/product/show.blade.php ENDPATH**/ ?>