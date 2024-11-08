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
        <div class="desktop">
            <div class="owl-carousel owl-theme owl-carousel-principal-mobile shadow" style="position: relative">
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
        <div class="mobile">
            <div class="owl-carousel owl-theme owl-carousel-principal ">
                <?php $__currentLoopData = $bannersPrincipal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="<?php echo e($banner->url); ?>">
                            <figure data-background="/storage/banner/big_<?php echo e($banner->img); ?>"
                                class="item owl-carousel__item"
                                style="background-image: url(/storage/banner/big_<?php echo e($banner->img); ?>);width: 100%;height: 200px;background-repeat: no-repeat;background-position: center center;">
                            </figure>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="all-content p-geral">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $carro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-6">
                        <a href="/carro/<?php echo e($c->ref_amigavel); ?>" class="carro-card">
                            <img class="g-background-1 carro-card_img"
                                style="background-image: url(/storage/carro/big_<?php echo e($c->img); ?>);width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="carro-card_box d-flex flex-column gap-3">
                                <div class="carro-card_box-categoria"><?php echo e($c->CATEGORIA); ?></div>
                                <div class="carro-card_box-titulo"><?php echo e($c->titulo); ?></div>
                                <div class="d-flex justify-content-between">
                                    <div class="carro-card_box-ano"><strong>ANO:</strong> <?php echo e($c->ano); ?></div>
                                    <div class="carro-card_box-combustivel"><strong>COMB:</strong> <?php echo e($c->combustivel); ?>

                                    </div>
                                </div>
                                <div class="carro-card_box-valor">R$ <?php echo $c->valor; ?></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/carros" class="g-btn-ver-todos">VER VITRINE COMPLETA</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="m-t-50"><strong>SIGA-NOS NO INSTAGRAN</strong></h1>
                    <div>
                        <script src="https://static.elfsight.com/platform/platform.js" async></script>
                        <div class="elfsight-app-7d1ee193-9622-4c8e-8b5c-c62cc039523d" data-elfsight-app-lazy></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/work/www/vgs_auto_group/vgs_auto/Modules/Site/Resources/views/index.blade.php ENDPATH**/ ?>