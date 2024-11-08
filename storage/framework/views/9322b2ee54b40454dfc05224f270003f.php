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
    <meta property="og:url" content="https://cursoseterapiasintegradas.com.br">
    <meta property="og:author" content="Cursos e Terapias Integradas">

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

    <!-- Google tag (gtag.js) -->
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-THD77CF5RK');
    </script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet" />

    <link href="/vendorjs/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendorjs/owl/assets/owl.theme.default.css" rel="stylesheet">
    <link rel="shortcut icon" href="/dist/img/favicon.png" />

    
    

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
                        <div class="container">
                            <a class="navbar-brand" href="/">
                                <div class="logo">
                                    <img src="<?php echo e(env('APP_LOGO_HEADER')); ?>" title="logo cursos e Terapias Integradas"
                                        alt="logo cursos e Terapias Integradas">
                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end gap-5" id="navbarSupportedContent">
                                <ul class="navbar-nav  mb-2 mb-lg-0 d-flex items-center ">
                                    <?php echo $__env->make('site::inc-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </ul>
                                <a href="https://wa.me/5551998331102?text=VGS%20negócios%20automotivos" target="_blanck"
                                    class="header-redes-sociais desktop">
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
<?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/layouts/master.blade.php ENDPATH**/ ?>