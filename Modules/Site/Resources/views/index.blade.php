@extends('site::layouts.master')

@section('css')

@stop

@section('js')
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


@stop



@section('content')


    <div class="all-banner">
        <div class="desktop">
            <div class="owl-carousel owl-theme owl-carousel-principal-mobile shadow" style="position: relative">
                @foreach ($bannersPrincipal as $banner)
                    <div class="item">
                        <a href="{{ $banner->url }}" data-background="/storage/banner/big_{{ $banner->img }}"
                            class="item owl-carousel__item"
                            style="background-image: url(/storage/banner/big_{{ $banner->img }});width: 100%;height: 384px;background-repeat: no-repeat;background-position: center center;background-size: cover;display:block">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mobile">
            <div class="owl-carousel owl-theme owl-carousel-principal ">
                @foreach ($bannersPrincipal as $banner)
                    <div class="item">
                        <a href="{{ $banner->url }}">
                            <figure data-background="/storage/banner/big_{{ $banner->img }}"
                                class="item owl-carousel__item"
                                style="background-image: url(/storage/banner/big_{{ $banner->img }});width: 100%;height: 200px;background-repeat: no-repeat;background-position: center center;">
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="all-content p-geral">
        <div class="container">
            <div class="row">
                @foreach ($carro as $c)
                    <div class="col-lg-3 col-6">
                        <a href="/carro/{{ $c->ref_amigavel }}" class="carro-card">
                            <img class="g-background-1 carro-card_img"
                                style="background-image: url(/storage/carro/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="carro-card_box-categoria">{{ $c->CATEGORIA }}</div>
                            <div class="carro-card_box d-flex flex-column gap-3">
                                <div class="carro-card_box-titulo">{{ $c->titulo }}</div>
                                <div class="d-flex justify-content-between">
                                    <div class="carro-card_box-ano"><strong>ANO:</strong> {{ $c->ano }}</div>
                                    <div class="carro-card_box-combustivel"><strong>COMB:</strong> {{ $c->combustivel }}
                                    </div>
                                </div>
                                <div class="carro-card_box-valor">R$ <?php echo __currency_mysql_to_iso($c->valor); ?></div>
                            </div>
                        </a>
                    </div>
                @endforeach

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




@stop
