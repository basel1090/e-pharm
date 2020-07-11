<?php $__env->startSection("title","Create New Product"); ?>


<?php $__env->startSection("content"); ?>

    <div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('products.store')); ?>" role="form">

                <?php echo csrf_field(); ?>
                <div class="form-body">
                    <div class="form-group has-success"><label for="form_control_1">Title</label>
                        <input type="text" class="form-control" id="form_control_1" name="title"
                               value="<?php echo e(old('title')); ?>" placeholder="Enter your Title">

                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="form_control_1">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php echo e(old('category_id')== $category->id?"selected":""); ?> value='<?php echo e($category->id); ?>'><?php echo e($category->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group has-success">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php echo e(old('brand_id')== $brand->id?"selected":""); ?> value='<?php echo e($brand->id); ?>'><?php echo e($brand->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="form-group row">
                    <div class='col-sm-6'>
                        <label for="imageFile">Image</label>
                        <div class="custom-file">
                            <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                        </div>
                    </div>
                </div>

                <div class="form-body ">
                    <div class="form-group has-success">
                        <label for="old_price">old price</label>
                        <input type="number" class="form-control" value="<?php echo e(old('title')); ?>" id="old_price" name="old_price">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="new_price">new price</label>
                    <input   type="number" class="form-control" value="<?php echo e(old('title')); ?>" id="new_price" name="new_price">
                </div>
                <div class="form-group ">
                    <label for="size">Size</label>
                    <input   type="number" class="form-control" value="<?php echo e(old('title')); ?>" id="size" name="size">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control"  id="description" value="<?php echo e(old('title')); ?>" name="description" ></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" name='active' value="<?php echo e(old('title')?? ""); ?>" class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Active</label>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class='btn btn-default' href='<?php echo e(route("products.index")); ?>'>Cancel</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp9\htdocs\e-pharm\resources\views/admin/product/create.blade.php ENDPATH**/ ?>