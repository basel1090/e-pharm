<?php $__env->startSection('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Blog</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href=<?php echo e(route('Home')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">

    <div class="container">

        <div class="row">

            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 ftco-animate">

                <div class="blog-entry">

                    <a href="blog-single.html" class="block-20" ><img class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" src="<?php echo e(asset("storage/".$blog->image)); ?>"
                                                                      class="img-responsive img-circle" alt="No Image Found" style="width:480px" >
                    </a>
                    <div class="text pt-3 pb-4 px-4">
                        <div class="meta">
                            <div><a href="#"><?php echo e($blog->created_at); ?></a></div>
                        </div>
                        <h3 class="heading"><a href="#"><?php echo e($blog->title); ?></a></h3>
                        <p class="clearfix">
                            <a href="<?php echo e(route('Home')); ?>" class="float-left read">Read more</a>
                            <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                        </p>
                    </div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <?php echo e($blogs->links()); ?>
















    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('FrontEnd.layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/FrontEnd/site/blog.blade.php ENDPATH**/ ?>