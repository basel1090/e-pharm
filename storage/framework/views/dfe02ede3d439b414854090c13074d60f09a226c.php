
<?php $__env->startSection("title", "Manage Products"); ?>
<?php $__env->startSection("content"); ?>

    <form class='row'>
        <div class='col-sm-2'>
            <input type='text' class="form-control" placeholder="enter product name" name="name"/></div>

        <div class='col-sm-2'>
        <select name="category" class="form-control">
                        <option value="">Any Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php echo e(request()->get('category')== $category->id?"selected":""); ?> value='<?php echo e($category->id); ?>'><?php echo e($category->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
        </div>
        <div class='col-sm-2'>
            <select name="brand" class="form-control">
                <option value="">Any Brand</option>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        <?php echo e(request()->get('brand')== $brand->id?"selected":""); ?> value='<?php echo e($brand->id); ?>'><?php echo e($brand->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class='col-sm-2'>
            <select name='active' class='form-control'>
                <option value=''>Any status</option>
                <option <?php echo e(request()->get("published")?"selected":""); ?> value='1'>Active</option>
                <option <?php echo e(request()->get("published")=='0'?"selected":""); ?> value='0'>InActive</option>
            </select></div>
        <div class='col-sm-2'>
            <button type='submit' class='btn btn-primary'><i class="fa fa-search"></i>search</button>
        </div>
        <div class="col-2">

            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Create New Product</a>
        </div>
    </form>
    <?php if($products->count()>0): ?>
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th> Title</th>
                <th> Old Price</th>
                <th>New Price</th>
                <th> Size</th>
                <th>Image</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Active</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('products.show' , $product->id)); ?>"><?php echo e($product->title); ?></a></td>
                    <td><?php echo e($product->old_price); ?></td>
                    <td><?php echo e($product->new_price); ?></td>
                    <td><?php echo e($product->size); ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Popup image</button>

                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="<?php echo e(asset("storage/".$product->image)); ?>" class="img-responsive" alt="No Image Found" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?php echo e($product->category->title); ?></td>
                    <td><?php echo e($product->brand->title); ?></td>
                    <td>
                        <input type="checkbox" disabled <?php echo e($product->active?"checked" : ""); ?>>
                    </td>



                    <td width="20%">
                        <form method="post" action="<?php echo e(route('products.destroy', $product->id)); ?>">

                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>
                            <button onclick='return confirm("Are you sure??")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($products->links()); ?>

    <?php else: ?>
        <div class='alert alert-warning'>Sorry, there is no results to your search</div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sora Sofyan\Desktop\e-pharm\e-pharm\resources\views/admin/product/index.blade.php ENDPATH**/ ?>