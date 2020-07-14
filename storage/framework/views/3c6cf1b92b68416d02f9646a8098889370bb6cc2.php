<?php $__env->startSection("title", "Manage User"); ?>


<?php $__env->startSection("content"); ?>



            <form class='row'>
                <div class="col-sm-5 ">
                    <input autofocus value="<?php echo e(request()->get('q')); ?>" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
                </div>
                 <div class='col-sm-2'>
                    <select name="role" class="form-control">
                        <option value="">Any Role</option>
                        <?php $__currentLoopData = \Spatie\Permission\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php echo e(request()->get('role')== $role->id?"selected":""); ?> value='<?php echo e($role->id); ?>'><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
        </div>
                <div class="col-sm-3 ">
                    <button class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                    <a href="<?php echo e(route("users.create")); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Create New user</a>

                </div>
            </form>


            <div class="table-scrollable">

                <?php if($users->count()>0): ?>

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Role </th>
                                <th> Status </th>
                                <th> Created At</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($user->name); ?> </td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->roles[0]->name??'Without Roles'); ?></td>
                               
                               <td>
                                <?php if($user->hasRole('customer')): ?>
                                <a href='<?php echo e(route("user.status",$user->id)); ?>' class='btn btn-xs btn-<?php echo e(!$user->is_active?"info":"danger"); ?>'><?php echo e($user->is_active?"Reject":"Approve"); ?></a>
                                <?php endif; ?>
                                </td>
                                <td> <?php echo e($user->created_at); ?> </td>

                                <td width="20%">
                                    <form method="post" action="<?php echo e(route('users.destroy', $user->id)); ?>">
                                        <!--a href="<?php echo e(route("users.show", $user->id)); ?>" class="btn btn-info btn-xs"><i class='fa fa-eye'></i></a-->
                                        <?php if(auth()->user()->links->where('route','permissions')->count()>0): ?>
                                        <a href="<?php echo e(route("permissions", $user->id)); ?>" class="btn btn-info btn-xs"><i class='fa fa-lock'></i></a>
                                        <?php endif; ?>
                                        <?php if(auth()->user()->links->where('route','users.edit')->count()>0): ?>
                                        <a href="<?php echo e(route("users.edit", $user->id)); ?>" class="btn btn-primary btn-xs"><i class='fa fa-edit'></i></a>
                                        <?php endif; ?>
                                        <?php if(auth()->user()->links->where('route','users.destroy')->count()>0): ?>
                                        <a href="<?php echo e(route("delete-user", $user->id)); ?>" onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-xs"><i class='fa fa-trash'></i></a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                    </form>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($users->links()); ?>

                <?php else: ?>
                    <div class="alert alert-warning"> Sorry there is no result to your search </div>

                <?php endif; ?>
                </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp9\htdocs\e-pharm\resources\views/admin/user/index.blade.php ENDPATH**/ ?>