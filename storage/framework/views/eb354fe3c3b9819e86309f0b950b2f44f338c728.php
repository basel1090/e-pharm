<?php $__env->startSection("title", "Manage Contact-Us"); ?>
<?php $__env->startSection("content"); ?>

    <div class="table-scrollable">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th> #</th>
                <th> Name</th>
                <th> Email</th>
                <th> Subject</th>
                <th> Message</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td> <?php echo e($contact->id); ?> </td>
                    <td> <?php echo e($contact->name); ?> </td>

                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e($contact->subject); ?></td>
                    <td><?php echo e($contact->message); ?></td>
                    <td>


                        <form method="post" action="<?php echo e(route('contacts.destroy', $contact->id)); ?>">







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

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/ContactUs/index.blade.php ENDPATH**/ ?>