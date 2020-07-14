
<?php $__env->startSection("title", "Manage Brand"); ?>
<?php $__env->startSection("content"); ?>
<div class="portlet light ">

                            <form class="portlet-body">
                                <div class='row'>
                                    <div class="col-sm-8">
                                        <input name="q" autofocus type="text" placeholder="Enter your search" value='<?php echo e(request()->get("q")); ?>' class="form-control" />
                                    </div>


                                    <div class="col-sm-3">
                                        <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                                        <a href="<?php echo e(route('brands.create')); ?>" class='btn btn-success'><i class='fa fa-plus'></i> Add New Brand</a>
                                    </div>
</div>
                                </form>
                                <hr>
                                    <?php if($brands->count()>0): ?>
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Title </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($brand->id); ?></td>
                                                <td><?php echo e($brand->title); ?></td>


                                                    <td width="20%">
                    <form method="post" action="<?php echo e(route('brands.destroy', $brand->id)); ?>">
                        <a href="<?php echo e(route("brands.show", $brand->id)); ?>" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                        <a href="<?php echo e(route("brands.edit", $brand->id)); ?>" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                        <button onclick='return confirm("Are you sure ?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                    </form>
                </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

<?php echo e($brands->links()); ?>

<?php else: ?>
    <div class='alert alert-warning'>Sorry, there is no results to your search</div>
<?php endif; ?>
                                </div>

                            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ahmed\Desktop\pharm\e-pharm\resources\views/admin/brand/index.blade.php ENDPATH**/ ?>