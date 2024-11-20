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
                    <div class="col-lg-3 col-12">
                        <a href="/carro/<?php echo e($c->ref_amigavel); ?>" class="carro-card">
                            <div class="position-relative">
                                <div class="g-background-1  carro-card_img"
                                    style="background-image: url(/storage/carro/big_<?php echo e($c->img); ?>);width: 100%">
                                </div>
                                <div class="carro-card-mask"></div>
                            </div>
                            <div class="carro-card_box-categoria"><?php echo e($c->CATEGORIA); ?></div>
                            <div class="carro-card_box d-flex flex-column gap-3">
                                <div class="carro-card_box-titulo"><?php echo e($c->titulo); ?></div>
                                <div class="carro-card_box-ano">Ano: <?php echo e($c->ano); ?></div>
                                <div class="carro-card_box-valor">R$ <?php echo __currency_mysql_to_iso($c->valor); ?></div>
                                <div class="carro-card_box-desc">
                                    <hr>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="carro-card_box-km">KM: <strong><?php echo e($c->km); ?></strong></div>
                                        <div class="carro-card_box-combustivel"><span>&nbsp;-&nbsp;</span>Comb: <strong>
                                                <?php echo e($c->combustivel); ?></strong>
                                        </div>
                                    </div>
                                </div>
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
                    <h1 class="m-t-50 text-center"><strong>SIGA-NOS NO INSTAGRAM</strong></h1>
                    <div>
                        <div class="desktop">
                            <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                                src="https://www.instagram.com/vgs.auto/embed/?cr=1&amp;v=12&amp;wp=1242&amp;rd=https%3A%2F%2Fvgsauto.com.br"
                                allowtransparency="true" allowfullscreen="true" frameborder="0" height="850"
                                data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                                style="background: white; max-width: 70%; width: 70%; max-height: 100%; border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;margin: auto"></iframe>
                        </div>
                        <div class="mobile">
                            <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                                src="https://www.instagram.com/vgs.auto/embed/?cr=1&amp;v=12&amp;wp=1242&amp;rd=https%3A%2F%2Fvgsauto.com.br"
                                allowtransparency="true" allowfullscreen="true" frameborder="0" height="500"
                                data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                                style="background: white; max-width: 99.375%; width: 99.375%; max-height: 100%; border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Site\Resources/views/index.blade.php ENDPATH**/ ?>