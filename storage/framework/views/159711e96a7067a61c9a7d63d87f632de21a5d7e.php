<?php $__env->startSection("title", "Manage Products"); ?>
<?php $__env->startSection("content"); ?>

    <form class='row'>
        <div class='col-sm-6'>
            <input type='text' class="form-control" placeholder="enter your search"
                   name="q"/></div>
        <div class='col-sm-2'>
            <select name='published' class='form-control'>
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
                <th> #</th>
                <th> title</th>
                <th> old_price</th>
                <th>new_price</th>
                <th> size</th>
                <th>image</th>
                <th> description</th>
                <th>category_id</th>
                <th>brand_id</th>
                <th>active</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><a href="<?php echo e(route('products.show' , $product->id)); ?>"><?php echo e($product->title); ?></a></td>
                    <td><?php echo e($product->old_price); ?></td>
                    <td><?php echo e($product->new_price); ?></td>
                    <td><?php echo e($product->size); ?></td>
                    <td><?php echo e($product->image); ?></td>
                    <td><?php echo e($product->description); ?></td>
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
    <?php else: ?>
        <div class='alert alert-warning'>Sorry, there is no results to your search</div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/obaida/mywebsites/ggateway/e-pharm/resources/views/admin/product/index.blade.php ENDPATH**/ ?>