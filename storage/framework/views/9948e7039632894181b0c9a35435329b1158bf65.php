<?php $__env->startSection("title", "Manage Products"); ?>
<?php $__env->startSection("content"); ?>

    <div class="table-scrollable">

        
        <a href="<?php echo e(route("about.create")); ?>" class="btn btn-success btn-md"><i class='fa fa-plus'>
                Create New</i></a>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Title</th>
                <th> image</th>
                <th> description</th>
                <th> Any Status</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td> <?php echo e($about->id); ?> </td>
                    <td> <?php echo e($about->title); ?> </td>
                    <td width="20%">
                        <img src="<?php echo e(asset("storage/".$about->image)); ?>" class="img-responsive" alt="image not found" style="width:80px">
                    </td>
                    <td><?php echo e($about->description); ?></td>
                    <td>
                        <form method="post" action="<?php echo e(route('about.destroy', $about->id)); ?>">
                            <a href="<?php echo e(route("about.show", $about->id)); ?>" class="btn btn-info btn-sm"><i
                                    class='fa fa-eye'></i></a>

                            <a href="<?php echo e(route("about.edit", $about->id)); ?>" class="btn btn-primary btn-sm"><i
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

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/About/index.blade.php ENDPATH**/ ?>