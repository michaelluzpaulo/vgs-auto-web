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
                            <div class="position-relative">
                                <img class="g-background-1 carro-card_img"
                                    style="background-image: url(/storage/carro/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                                <div class="carro-card-mask"></div>
                            </div>
                            <div class="carro-card_box-categoria">{{ $c->CATEGORIA }}</div>
                            @if ($c->vendido == 'S')
                                <div class="target text-center">VENDIDO</div>
                            @endif
                            <div class="carro-card_box d-flex flex-column gap-3">
                                <div class="carro-card_box-titulo">{{ $c->titulo }}</div>
                                <div class="carro-card_box-valor">R$ <?php echo __currency_mysql_to_iso($c->valor); ?></div>
                                <div class="carro-card_box-desc">
                                    <hr>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="carro-card_box-ano">Ano: <strong>{{ $c->ano }}</strong></div>
                                        <div class="carro-card_box-km">
                                            <span>&nbsp;-&nbsp;</span>KM: <strong>{{ $c->km }}</strong>
                                        </div>
                                        <div class="carro-card_box-combustivel"><span>&nbsp;-&nbsp;</span>Comb: <strong>
                                                {{ $c->combustivel }}</strong>
                                        </div>
                                    </div>
                                </div>
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
                    <h1 class="m-t-50"><strong>SIGA-NOS NO INSTAGRAM</strong></h1>
                    <div>
                        <div class="desktop">
                            <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                                src="https://www.instagram.com/vgs.auto/embed/?cr=1&amp;v=12&amp;wp=1242&amp;rd=https%3A%2F%2Fvgsauto.com.br"
                                allowtransparency="true" allowfullscreen="true" frameborder="0" height="900"
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




@stop
