
<?php $__env->startSection("title", "Manage Category"); ?>
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
            
            <button name="export" value='Export' type='submit' class='btn btn-success'><i class="fa fa-excel"></i>Export</button>
        
        </div>
        <div class="col-2">

            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success">Create New Category</a>
        </div>
    </form>
    <?php if($categories->count()>0): ?>
        <table align="center" class="table mt-3 table-striped table-bordered">
            <thead>
            <tr>
                <th> Title</th>
                <th>published</th>
                <th width="20%"></th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->title); ?></td>
                   <td>
                       <?php if($category->published): ?>
                           <a href="<?php echo e(route('category.status',$category->id)); ?>" style="width: 80px" class="btn btn-success btn-sm" >Active</a>
                       <?php else: ?>
                           <a href="<?php echo e(route('category.status',$category->id)); ?>" style="width: 80px"  class="btn btn-warning btn-sm">Pending</a>

                       <?php endif; ?>
                   </td>



                    <td width="20%">
                        <form method="post" action="<?php echo e(route('categories.destroy', $category->id)); ?>">

                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-primary btn-sm"><i
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

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sora Sofyan\Desktop\NDc\e-pharm\resources\views/admin/category/index.blade.php ENDPATH**/ ?>