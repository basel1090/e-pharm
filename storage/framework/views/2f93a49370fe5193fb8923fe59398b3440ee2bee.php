

<?php $__env->startSection("title",  $user->name . " - Permissions"); ?>

<?php $__env->startSection("content"); ?>


<form method="post" action='<?php echo e(route("permissions-post",$user->id)); ?>'>
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div>
            <ul class='list-unstyled'>
                <?php $__currentLoopData = $links->where('parent_id',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <label>
                            <input <?php echo e($link->users->contains($user)?"checked":""); ?> name='permissions[]' type='checkbox' value='<?php echo e($link->id); ?>' />
                            <b><?php echo e($link->title); ?></b>
                        </label>
                        <?php if($link->subMenus->count()>0): ?>
                            <ul class='list-unstyled'>
                            <?php $__currentLoopData = $link->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label>
                                        <input name='permissions[]'<?php echo e($subLink->users->contains($user)?"checked":""); ?>  type='checkbox' value='<?php echo e($subLink->id); ?>' />
                                        <?php echo e($subLink->title); ?>

                                    </label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="card-footer mt-4">
            <button type="submit" class="btn btn-primary">Save Permissions</button>

            <a class='btn btn-default' href='<?php echo e(route("users.index")); ?>'>Cancel</a>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sora Sofyan\Desktop\e-pharm\e-pharm\resources\views/admin/user/permissions.blade.php ENDPATH**/ ?>