<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $('.owl-carousel-principal').owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            // margin: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            dots: false,
            nav: false,
            navText: [
                "<i class='bi bi-chevron-compact-left' aria-hidden='true' style='color:#fff' title='back'></i>",
                "<i class='bi bi-chevron-compact-right' aria-hidden='true' style='color:#fff' title='next'></i>"
            ]
        });

        $('.owl-carousel-principal-mobile').owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            // margin: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            dots: false,
            nav: false,
            navText: [
                "<i class='bi bi-chevron-compact-left' aria-hidden='true' style='color:#fff' title='back'></i>",
                "<i class='bi bi-chevron-compact-right' aria-hidden='true' style='color:#fff' title='next'></i>"
            ]
        });


        //  $('.myModal').modal()
    </script>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


    <div class="all-banner">
        <div class="owl-carousel owl-theme owl-carousel-principal-mobile" style="position: relative">
            <?php $__currentLoopData = $bannersPrincipal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="<?php echo e($banner->url); ?>" data-background="/storage/banner/big_<?php echo e($banner->img); ?>"
                        class="item owl-carousel__item"
                        style="background-image: url(/storage/banner/big_<?php echo e($banner->img); ?>);width: 100%;height: 384px;background-repeat: no-repeat;background-position: center center;background-size: cover;display:block">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
    </div>
    <div class="all-content p-geral">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $carros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-6">
                        <div class="curso-box g-background-1 position-relative"
                            style="background-image: url(/storage/carro/big_<?php echo e($c->img); ?>);width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="g-box_shadow"></div>
                            <div class="curso-box_title"><?php echo e($c->titulo); ?></div>
                            <a href="/carro/<?php echo e($c->ref_amigavel); ?>" class="curso-box_btn">Saiba<i
                                    class="bi bi-plus-circle-fill"></i></a>
                            <div class="curso-box_mask"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/carros" class="g-btn-ver-todos">VER VITRINE COMPLETA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/index.blade.php ENDPATH**/ ?>