<?php $__env->startSection("title", "Manage Setting"); ?>
<?php $__env->startSection("content"); ?>

    <div class="table-scrollable">

        
        <a href="<?php echo e(route("setting.create")); ?>" class="btn btn-success btn-md"><i class='fa fa-plus'>
                Create New</i></a>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Logo</th>
                <th> Facebook</th>
                <th> Instagram</th>
                <th> Twitter</th>
                <th> Status</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $NewSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td> <?php echo e($NewSetting->id); ?> </td>
                    <td> <?php echo e($NewSetting->logo); ?> </td>
                    <td><?php echo e($NewSetting->facebook); ?></td>
                    <td><?php echo e($NewSetting->instagram); ?></td>
                    <td><?php echo e($NewSetting->twitter); ?></td>
                    <td><?php echo e($NewSetting->active); ?></td>
                    <td>
                        <form method="post" action="<?php echo e(route('setting.destroy', $NewSetting->id)); ?>">
                            <a href="<?php echo e(route("setting.show", $NewSetting->id)); ?>" class="btn btn-info btn-sm"><i
                                    class='fa fa-eye'></i></a>

                            <a href="<?php echo e(route("setting.edit", $NewSetting->id)); ?>" class="btn btn-primary btn-sm"><i
                                    class='fa fa-edit'></i></a>


                            <button onclick='return confirm("Are you sure ?")' type="submit"
                                    class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("DELETE"); ?>


                    </form>
                    </td>
</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>


    

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>