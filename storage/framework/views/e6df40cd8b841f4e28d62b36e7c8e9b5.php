<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>VGS Autos</title>
    <meta
        content="VGS negócios automotivos atua no ramo de comércio de automóveis,trabalhando com alguns diferenciais como amizade, respeito,profissionalismo e transparência em nossos serviços prestados."
        name="description">
    <meta name="keywords" content="revenda de carros, carros, carros usados, venda de carro, compra de carro, revenda">
    <meta property="og:title" content="VGS negócios automotivos">
    <meta property="og:description" content="">
    <meta property="og:type" content="article" />
    <meta property="og:image" content="">
    <meta property="og:url" content="https://vgsauto.com.br">
    <meta property="og:author" content="VGS negócios automotivos">

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '8596223893764374');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=8596223893764374&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <link href="/vendorjs/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendorjs/owl/assets/owl.theme.default.css" rel="stylesheet">
    <link rel="shortcut icon" href="/dist/img/favicon.png" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/4.2.10/iframeResizer.min.js"></script>

    <head>
        


        
        

        <?php echo $__env->yieldContent('css'); ?>
        <link rel="stylesheet" href="/dist/css/site.css?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>">

        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>


    </head>

<body id="<?php echo e($pgId); ?>" class="<?php echo e($pgId); ?> <?php echo e($pgClass); ?> ">
    <div class="wrapper">
        <header>
            <div class="all-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <div class="logo">
                                <img src="<?php echo e(env('APP_LOGO_HEADER')); ?>" title="VGS negócios automotivos"
                                    alt="logo VGS negócios automotivos">
                            </div>
                        </a>
                        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end gap-5" id="navbarSupportedContent">
                            <ul class="navbar-nav  mb-2 mb-lg-0 d-flex items-center ">
                                <?php echo $__env->make('site::inc-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </ul>
                            <div class="desktop">
                                <a href="https://wa.me/5551998331102?text=VGS%20negócios%20automotivos" target="_blanck"
                                    class="header-redes-sociais">
                                    <i class="bi bi-whatsapp header-redes-sociais-ico"></i>
                                    <span>(51) 99833-1102</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <footer>
            <?php echo $__env->make('site::inc-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
        <a class="whats_fixed" href="https://wa.me/5551998331102?text=VGS%20negócios%20automotivos" target="_blank"
            title="whatsapp">
            <i class="bi bi-whatsapp" aria-hidden="true"></i>
        </a>
    </div>
    
    <script src="/vendorjs/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script src="/vendorjs/owl/owl.carousel.min.js"></script>
    <script src="/dist/js/services/service-notify.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/core/Validator.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/core/ModalFactory.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/services/service-http.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/vendorjs/jquery.loadmask.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/vendorjs/jquery.maskedinput.min.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/vendorjs/jquery.serializejson.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/vendorjs/jquery.validate.min.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/core/Utils.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/core/Config.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>


    <?php echo $__env->yieldContent('js'); ?>
    <script src="/dist/js/site/Financiamento.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/site/Contato.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>
    <script src="/dist/js/site/main.js?v=<?php echo e(env('APP_VERSION_ARQUIVE_STATIC')); ?>"></script>

    

</body>

</html>
<?php /**PATH /Volumes/work/www/vgs_auto_group/vgs_auto/Modules/Site/Resources/views/layouts/master.blade.php ENDPATH**/ ?>