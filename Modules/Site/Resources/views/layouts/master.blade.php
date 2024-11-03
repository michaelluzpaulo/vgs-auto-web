<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Terapias Integradas</title>
    <meta
        content="A área terapêutica tem evoluído significativamente, adaptando-se às demandas atuais. Hoje, se busca resultados rápidos e eficazes, e por isso sou focada e especializada em abordagens práticas com ferramentas e tratamentos que promovem autoconhecimento profundo"
        name="description">
    <meta name="keywords"
        content="Terapias, REIKI, CONHECENDO MEU CAMPO ENERGÉTICO, CONSTELAÇÃO SISTÊMICA FAMILIAR,DESENVOLVENDO VISÃO SISTEMICA, COMUNICAÇÃO NÃO VIOLENTA, REIKI MESTRADO, PSICANÁLISE MODERNA,TERAPIA DE ESQUEMAS DE YOUNG, TERAPIA COGNITIVO COMPORTAMENTAL, CONSTELAÇÃO FAMILIAR, REIKI TERAPIA, TERAPIAS EM GRUPO, CONSTELAÇÃO ORGANIZACIONAL, TERAPIA ONLINE">
    <meta property="og:title" content="Cursos e Terapias Integradas">
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-THD77CF5RK"></script>
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
    <link href="https://fonts.googleapis.com/css2?family=Yaldevi:wght@200..700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <link href="/vendorjs/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendorjs/owl/assets/owl.theme.default.css" rel="stylesheet">
    <link rel="shortcut icon" href="/dist/img/favicon.png" />

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> --}}

    @yield('css')
    <link rel="stylesheet" href="/dist/css/site.css?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}">

    @vite(['resources/js/app.js'])


</head>

<body id="{{ $pgId }}" class="{{ $pgId }} {{ $pgClass }} ">
    <div class="wrapper">
        <header>
            <div class="all-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container">
                            <a class="navbar-brand" href="/">
                                <div class="logo">
                                    <img src="{{ env('APP_LOGO_HEADER') }}" title="logo cursos e Terapias Integradas"
                                        alt="logo cursos e Terapias Integradas">
                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end gap-5" id="navbarSupportedContent">
                                <ul class="navbar-nav  mb-2 mb-lg-0">
                                    @include('site::inc-menu')
                                </ul>
                                <div class="header-redes-sociais d-flex gap-3">
                                    <a href="https://www.instagram.com/terapias_integradas_suelen/" target="_blanck"><i
                                            class="bi bi-instagram header-redes-sociais-ico"></i></a>
                                    <a href="https://wa.me/5511932443316?text=Abordagem%20prática,%20foco%20em%20resultados%20eficientes!"
                                        target="_blanck"><i class="bi bi-whatsapp header-redes-sociais-ico"></i></a>
                                    <a href="https://www.tiktok.com/@suelenpereira_terapias" target="_blanck"><i
                                            class="bi bi-tiktok header-redes-sociais-ico"></i></a>
                                    <a href="https://www.youtube.com/@cursoseterapiasintegradas" target="_blanck"><i
                                            class="bi bi-youtube header-redes-sociais-ico"></i></a>
                                </div>
                                <a href="/area-restrita-aluno" class="header-btn_area-restrita">Área do Aluno</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>


        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('site::inc-redes-sociais')
            @include('site::inc-footer')
        </footer>
    </div>
    {{--
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    <script src="/vendorjs/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script src="/vendorjs/owl/owl.carousel.min.js"></script>
    <script src="/dist/js/services/service-notify.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/core/Validator.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/core/ModalFactory.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/services/service-http.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/vendorjs/jquery.loadmask.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/vendorjs/jquery.maskedinput.min.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/vendorjs/jquery.serializejson.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/vendorjs/jquery.validate.min.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/core/Utils.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/core/Config.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>


    @yield('js')
    <script src="/dist/js/site/Contato.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/site/main.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>

</body>

</html>
