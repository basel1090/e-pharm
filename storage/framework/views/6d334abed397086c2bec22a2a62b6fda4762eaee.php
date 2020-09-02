<?php $__env->startSection('content'); ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-4">
                    <h1 class="mb-2 bread">About</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(route('About')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-wrap-about">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-7 d-flex">
                    <div class="img img-2 ml-md-2" ><img class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" src="<?php echo e(asset("storage/".$about->image)); ?>"
                                                         class="img-responsive img-circle" alt="No Image Found" style="width:480px" ></div>
                </div>

                <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
                    <div class="heading-section mb-4 my-5 my-md-0">
                        <span class="subheading">About</span>
                        <h2 class="mb-4">Nice Restaurant</h2>
                    </div>
                    <p><?php echo e($about->description); ?></p>
                    <p class="time">
                        <span><strong><?php echo e($about->title); ?></strong></span>
                        <span><strong><?php echo e($about->created_at); ?></strong></span>
                        </p>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('FrontEnd.layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/FrontEnd/site/about.blade.php ENDPATH**/ ?>