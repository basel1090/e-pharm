
<?php $__env->startSection('title' , 'change password'); ?>
<?php $__env->startSection("content"); ?>
<div class="portlet light ">
        <div class="portlet-body form">
            <form method="post" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field("put"); ?>
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="current_password" value="">
                        <label for="form_control">Current Password</label>
                    </div>
                </div>
                
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="new_password" value="">
                        <label for="form_control">New Password</label>
                    </div>
                </div>
                
                <div class="form-body">
                    <div class="form-group form-md-line-input has-success">
                        <input type="password" class="form-control" id="form_control_1" name="new_password_confirmation" value="">
                        <label for="form_control">Re-type New Password</label>
                    </div>
                </div>
                
                <div class="form-actions noborder">
                    <button type="submit" class="btn btn-success">Change Password</button>
                    <a type="reset" href="" class="btn default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GL62\Desktop\NDC\Project\CMS\e-pharm\resources\views/admin/user/change_password.blade.php ENDPATH**/ ?>