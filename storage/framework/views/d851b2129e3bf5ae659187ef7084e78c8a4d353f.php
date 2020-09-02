<?php $__env->startSection("title", "Manage Blogs"); ?>
<?php $__env->startSection("content"); ?>
<div class="portlet light ">

                            <form class="portlet-body">
                                <div class='row'>
                                    <div class="col-sm-3">
                                        <input name="q" autofocus type="text" placeholder="Enter your search" value='<?php echo e(request()->get("q")); ?>' class="form-control" />
                                    </div>
                                    <div class="col-sm-3">
                                    <select name="published" class="form-control">
                                    <option value=''>Any Status</option>
                                    <option <?php echo e(request()->get("published") ?"selected":""); ?> value='1'>Active</option>
                                    <option <?php echo e(request()->get("published")=='0' ?"selected":""); ?> value='0'>Inactive</option>
                            </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
                                        <a href="<?php echo e(route('blogs.create')); ?>" class='btn btn-success'><i class='fa fa-plus'></i> Add New</a>
                                    </div>
                                    </div>
                                </form>
                                <hr>
                                    <?php if($blogs->count()>0): ?>
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="100">Image</th>
                                                    <th> Title </th>
                                                    <th>Details</th>
                                                    <th> Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                <td><img width='100' src='<?php echo e(asset("storage/".$blog->image)); ?>' /></td>
                                                <td><?php echo e($blog->title); ?></td>
                                                    <td>
                                                        <?php if($blog->published): ?>
                                                            <a href="<?php echo e(route('blog.pending',$blog->id)); ?>" style="width: 80px" class="btn btn-success btn-sm" >Active</a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('blog.confirm',$blog->id)); ?>" style="width: 80px"  class="btn btn-warning btn-sm">Pending</a>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td width="20%">
                                             <form method="post" action="<?php echo e(route('blogs.destroy', $blog->id)); ?>">

                                              <a href="<?php echo e(route("blogs.edit", $blog->id)); ?>" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

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

                          <?php echo e($blogs->links()); ?>

                          <?php else: ?>
                          <div class='alert alert-warning'>Sorry, there is no results to your search</div>
                          <?php endif; ?>
                                </div>

                                </div>

                           <?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>