<?php $__env->startSection('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(route('Home')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="ftco-search">
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php $i=0; ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="nav-link ftco-animate <?php echo e($i++==0?'active':''); ?>" id="v-pills-<?php echo e($category->id); ?>-tab" data-toggle="pill" href="#v-pills-<?php echo e($category->id); ?>" role="tab" aria-controls="v-pills-<?php echo e($category->id); ?>" aria-selected="true"><?php echo e($category->title); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content" id="v-pills-tabContent">
                    <?php $i=0; ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade <?php echo e($i++==0?' show active':''); ?>" id="v-pills-<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="day-<?php echo e($category->id); ?>-tab">
                            <div class="row no-gutters d-flex align-items-stretch">
                                <?php $__currentLoopData = $category->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                    <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                        <div class="menu-img img">
                                            <img class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" src="<?php echo e(asset("storage/".$product->image)); ?>"
                                                 class="img-responsive img-circle" alt="No Image Found"  >
                                        </div>
                                        <div class="text d-flex align-items-center">
                                            <div>
                                                <div class="d-flex">
                                                    <div class="one-half">
                                                        <h3><?php echo e($product->title); ?></h3>
                                                    </div>
                                                    <div class="one-forth">
                                                        <span class="price"><?php echo e($product->new_price); ?></span>
                                                    </div>
                                                </div>
                                                <p><span><?php echo e($product->description); ?></span></p>
                                                <p><a href="<?php echo e(route('Home')); ?>" class="btn btn-primary">Order now</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('FrontEnd.layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Resturant-Manegment\resources\views/FrontEnd/site/menu.blade.php ENDPATH**/ ?>