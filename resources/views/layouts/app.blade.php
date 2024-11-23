<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/shared/fontawesome-free/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="/shared/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/admin.css'])
</head>

<body>
    <div id="app" class="wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-login login shadow-sm" style="background-color:#080a00">
            <div class="container">

                <a class="navbar-brand m-auto" href="{{ url('/') }}" style="text-decoration: none;">
                    <img src="{{ env('APP_LOGO_HEADER') }}" title="logo vgs negócios automotivos"
                        alt="logo vgs negócios automotivos" style="height: 90px;">
                    {{-- <span class="brand-text" style="color: #fff;"><strong>Terapias</strong>&nbsp;Integradas</span> --}}
                    <!--
                    <img src="/img/logo.png" style="height: 70px"
                        alt="imagem com a logo escrita de sindicato das empresas de asseio, conservação e serviços terceirizados do estado de Santa Catarina">-->
                    {{-- {{ config('app.name', 'Laravel') }}   --}}
                </a>

            </div>
        </nav>

        <main class="login_content">
            @yield('content')
        </main>
    </div>

    <script src="/shared/jquery/jquery.min.js?v=1"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/dist/js/services/service-notify.js?v=1"></script>
    <script src="/dist/js/core/Validator.js?v=1"></script>
    <script src="/dist/js/core/ModalFactory.js?v=1"></script>
    <script src="/dist/js/services/service-http.js?v=1"></script>
    <script src="/dist/js/vendorjs/jquery.loadmask.js?v=1"></script>
    <script src="/dist/js/vendorjs/jquery.serializejson.js?v=1"></script>
    <script src="/dist/js/vendorjs/jquery.validate.min.js?v=1"></script>
    <script src="/dist/js/core/Utils.js?v=1"></script>
    {{--  <script src="/dist/js/core/Config.js?v=1"></script>
    <script src="/dist/js/modules/MinhaConta.js?v=1"></script> --}}


    @yield('js')
</body>

</html>
