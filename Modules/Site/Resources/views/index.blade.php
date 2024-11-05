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
        <div class="owl-carousel owl-theme owl-carousel-principal-mobile" style="position: relative">
            @foreach ($bannersPrincipal as $banner)
                <div class="item">
                    <a href="{{ $banner->url }}" data-background="/storage/banner/big_{{ $banner->img }}"
                        class="item owl-carousel__item"
                        style="background-image: url(/storage/banner/big_{{ $banner->img }});width: 100%;height: 384px;background-repeat: no-repeat;background-position: center center;background-size: cover;display:block">
                    </a>
                </div>
            @endforeach
        </div>
        {{-- <div class="banner mobile">
            <div class="owl-carousel owl-theme owl-carousel-principal">
                @foreach ($bannersPrincipal as $banner)
                    <div class="item">
                        <a href="{{ $banner->url }}">
                            <figure data-background="/storage/banner/big_{{ $banner->img_mob }}"
                                class="item owl-carousel__item"
                                style="background-image: url(/storage/banner/big_{{ $banner->img_mob }});width: 100%;height: 350px;background-repeat: no-repeat;background-position: center center;">
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    <div class="all-content p-geral">
        <div class="container">
            <div class="row">
                @foreach ($carros as $c)
                    <div class="col-lg-3 col-6">
                        <div class="curso-box g-background-1 position-relative"
                            style="background-image: url(/storage/carro/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="g-box_shadow"></div>
                            <div class="curso-box_title">{{ $c->titulo }}</div>
                            <a href="/carro/{{ $c->ref_amigavel }}" class="curso-box_btn">Saiba<i
                                    class="bi bi-plus-circle-fill"></i></a>
                            <div class="curso-box_mask"></div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/carros" class="g-btn-ver-todos">VER VITRINE COMPLETA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop
