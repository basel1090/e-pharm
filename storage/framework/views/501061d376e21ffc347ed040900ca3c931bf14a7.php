<?php
    $msg = \Session::get("msg");
    $msgClass = 'alert-info';
?>
<?php if($msg): ?>
    <?php
    //اول حرفين من الرسالة وتحويلهم الى حروف صغيرة
    $first2Letters = strtolower(substr($msg,0,2));
    if($first2Letters == 's:'){
        $msgClass = 'alert-success';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'w:'){
        $msgClass = 'alert-warning';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'i:'){
        $msgClass = 'alert-info';
        $msg = substr($msg,2);//قص اول حرفين
    }
    else if($first2Letters == 'e:'){
        $msgClass = 'alert-danger';
        $msg = substr($msg,2);//قص اول حرفين
    }
    ?>
    <div class='alert <?php echo e($msgClass); ?> alert-dismissible'>
        <?php echo e($msg); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger  alert-dismissible show">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH /home/obaida/mywebsites/ggateway/e-pharm/resources/views/shared/msg.blade.php ENDPATH**/ ?>