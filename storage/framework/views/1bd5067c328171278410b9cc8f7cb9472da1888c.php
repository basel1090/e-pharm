<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php
                $links = auth()->user()->links->where('parent_id',0)->where('show_in_menu',1);
            ?>
            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item start ">
                <a href="<?php echo e($link->route=='#'?'#':route($link->route)); ?>" class="nav-link nav-toggle">
                    <i class="<?php echo e($link->icon); ?>"></i>
                    <span class="title"><?php echo e($link->title); ?></span>
                    <?php if($link->subMenus->count()>0): ?>
                        <span class="arrow"></span>
                    <?php endif; ?>
                </a>
                <?php if($link->subMenus->count()>0): ?>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $link->subMenus->where('show_in_menu',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item start ">
                            <a href="<?php echo e(route($subMenu->route)); ?>" class="nav-link ">
                                <i class="<?php echo e($subMenu->icon); ?>"></i>
                                <span class="title"><?php echo e($subMenu->title); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\e-pharm\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>