
<?php $__env->startSection("title", "Manage Orders"); ?>
<?php $__env->startSection("content"); ?>

    <form class='row'>
        <div class="col-sm-2">
            <select name="product_id"  class="form-control">
                <option value=''>Any Product</option>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($product->id==request()->get('product_id')?"selected":""); ?> value='<?php echo e($product->id); ?>'><?php echo e($product->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="col-sm-2">
            <select name="user_id"  class="form-control">
                <option value=''>Any Customer</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($user->id==request()->get('user_id')?"selected":""); ?> value='<?php echo e($user->id); ?>'><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="col-sm-2">
            <select name= "order_status_id" class="form-control">
                <option value="">Any status</option>
                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($status->id==request()->get('order_status_id')?"selected":""); ?> value='<?php echo e($status->id); ?>'><?php echo e($status->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class='col-sm-2'>
            <input type='text' value='<?php echo e(request()->get("price")); ?>' class="form-control" placeholder="enter price to search"
                   name="price"/>
        </div>

        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>search</button>
        </div>
    </form>


    <?php if($orders->count()>0): ?>
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th> Order ID</th>
                <th> Customer name</th>
                <th> Product</th>
                <th> Quantity</th>
                <th> PRICE</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Status Action</th>
                <th> Action</th>
                

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->user->name??''); ?></td>
                    <td><?php echo e($order->product->title); ?></td>
                    <td><?php echo e($order->quantity); ?></td>
                    <td><?php echo e($order->price); ?></td>
                    <td><?php echo e($order->total_price); ?></td>
                    
                    <td>
                        <?php if($order->order_status_id==1): ?>
                            <span class="btn btn-warning btn-sm">Pending</span>
                        <?php elseif($order->order_status_id==2): ?>
                            <span class="btn btn-success btn-sm">Done</span>
                        <?php else: ?>
                            <span class="btn btn-danger btn-sm">Cancel</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($order->order_status_id==1): ?>
                            <a href="<?php echo e(route('order.done',$order->id)); ?>" style="width: 80px" class="btn btn-success btn-sm" >Done</a>
                            <a href="<?php echo e(route('order.cancel',$order->id)); ?>" style="width: 80px" class="btn btn-danger btn-sm" >Cancel</a>
                        <?php elseif($order->order_status_id==2): ?>
                            <a href="<?php echo e(route('order.pending',$order->id)); ?>" style="width: 80px" class="btn btn-warning btn-sm" >Pending</a>
                            <a href="<?php echo e(route('order.cancel',$order->id)); ?>" style="width: 80px" class="btn btn-danger btn-sm" >Cancel</a>
                        <?php elseif($order->order_status_id==3): ?>
                            <a href="<?php echo e(route('order.done',$order->id)); ?>" style="width: 80px" class="btn btn-success btn-sm" >Done</a>
                            <a href="<?php echo e(route('order.pending',$order->id)); ?>" style="width: 80px" class="btn btn-warning btn-sm" >Pending</a>

                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-primary btn-sm"><i
                                class='fa fa-eye'></i></a>


                        <a href="<?php echo e(route('delete-order', $order->id)); ?>">
                            <button onclick='return confirm("Are you sure??")' type="submit" class="btn btn-danger btn-sm">
                                <i class='fa fa-trash'></i></button>
                        </a>


                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($orders->links()); ?>



    <?php else: ?>
        <div class="alert alert-warning">Sorry, there is no results to your search</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-pharm\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>