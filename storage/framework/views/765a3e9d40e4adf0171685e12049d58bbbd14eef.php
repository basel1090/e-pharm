<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin | <?php echo $__env->yieldContent("title"); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #2 for blank page layout" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?> " rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo e(asset('metronic/assets/global/css/components-md.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/global/css/plugins-md.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo e(asset('metronic/assets/layouts/layout2/css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('metronic/assets/layouts/layout2/css/themes/blue.min.css')); ?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo e(asset('metronic/assets/layouts/layout2/css/custom.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo e(asset('metronic/favicon.ico')); ?>" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <link rel="stylesheet" href="MarkItUp/markitup/skins/simple/style.css" />
        <link rel="stylesheet" href="MarkItUp/markitup/sets/default/style.css" />


        <?php echo $__env->yieldContent("css"); ?>
        
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <?php echo $__env->make("layouts.admin.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="clearfix"> </div>
        <div class="page-container">
            <?php echo $__env->make("layouts.admin.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <h1 class="page-title"> <?php echo $__env->yieldContent("title"); ?>
                        <small> <?php echo $__env->yieldContent("subtitle"); ?></small>
                    </h1>

                    <div class="page-bar">
                        <!--ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Blank Page</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Page Layouts</span>
                            </li>
                        </ul-->
                    </div>
                    <?php echo $__env->make("shared.msg", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent("content"); ?>
                </div>
            </div>
        </div>
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo e(date("Y")); ?> &copy; NDC Laravel CMS Project

                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?php echo e(asset('metronic/assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?php echo e(asset('metronic/assets/layouts/layout2/scripts/layout.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/layouts/layout2/scripts/demo.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/layouts/global/scripts/quick-sidebar.min.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(asset('metronic/assets/layouts/global/scripts/quick-nav.min.js')); ?>" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <?php echo $__env->yieldContent("js"); ?>
    </body>
</html>
<?php /**PATH C:\Users\GL62\Desktop\NDC\Project\CMS\e-pharm\resources\views/layouts/admin.blade.php ENDPATH**/ ?>