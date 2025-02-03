<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Section Begin -->
    <section class="mb-5">
        <div class="container">
            <div class="hero__item set-bg" data-setbg="<?php echo e(asset('frontend/img/hero/banner.jpg')); ?>">
                <div class="hero__text">
                    <span>FRUIT FRESH</span>
                    <h2>Vegetable <br />100% Organic</h2>
                    <p>Free Pickup and Delivery Available</p>
                    <a href="#" class="primary-btn">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php $__currentLoopData = $menu_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="<?php echo e($menu_category->photo->getUrl()); ?>">
                                <h5><a href="<?php echo e(route('shop.index', $menu_category->slug)); ?>"><?php echo e($menu_category->name); ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="product-list">
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo e(asset('frontend/img/banner/banner-1.jpg')); ?>" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo e(asset('frontend/img/banner/banner-2.jpg')); ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-project\E-commerce\resources\views/frontend/homepage.blade.php ENDPATH**/ ?>