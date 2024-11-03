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

        $('.owl-carousel-depoimento').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });

        //  $('.myModal').modal()
    </script>


@stop



@section('content')


    <div class="all-banner">
        <div class="banner desktop">
            <div class="owl-carousel owl-theme owl-carousel-principal-mobile" style="position: relative">
                @foreach ($bannersPrincipal as $banner)
                    <div class="item">
                        <a href="{{ $banner->url }}" data-background="/storage/banner/big_{{ $banner->img }}"
                            class="item owl-carousel__item"
                            style="background-image: url(/storage/banner/big_{{ $banner->img }});width: 100%;height: 350px;background-repeat: no-repeat;background-position: center center;background-size: cover;display:block">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="banner mobile">
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
        </div>
    </div>

    <div class="sobre p-geral">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="sobre-box_fotos position-relative  d-flex justify-content-center">
                        <div class="sobre-box_fotos-box g-background-1 "
                            style="background-image: url(/storage/institucional/big_{{ $institucionalFoto->img }});background-repeat: no-repeat;background-position: center center;">
                        </div>
                        <div class="sobre-box_fotos-mask1 g-background-1"
                            style="background-image: url('/dist/img/mask1.png');">
                        </div>
                        <div class="sobre-box_fotos-mask2 g-background-1"
                            style="background-image: url('/dist/img/mask2.png');">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="sobre_content">
                        <?php echo $institucional->texto; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="flor_mask g-background-1" style="background-image: url('/dist/img/flor_mask.png');"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="all-curso-online p-geral">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-geral-p d-flex flex-column">
                        <h2 class="title-geral">CURSOS</h2>
                        <div class="title-geral-traco"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($cursos as $c)
                    <div class="col-lg-4 col-6">
                        <div class="curso-box g-background-1 position-relative"
                            style="background-image: url(/storage/curso/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="g-box_shadow"></div>
                            <div class="curso-box_title">{{ $c->nome }}</div>
                            <a href="/curso/{{ $c->ref_amigavel }}" class="curso-box_btn">Saiba<i
                                    class="bi bi-plus-circle-fill"></i></a>
                            <div class="curso-box_mask"></div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12">
                    <a href="/cursos" class="g-btn-ver-todos">VER TODOS OS CURSOS <span>></span> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="flor_mask g-background-1" style="background-image: url('/dist/img/flor_mask.png');"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="terapia p-geral">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-geral-p d-flex flex-column">
                        <h2 class="title-geral">TERAPIAS INTEGRADAS</h2>
                        <div class="title-geral-traco"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($terapias as $c)
                    <div class="col-lg-4 col-6">
                        <div class="terapia-box g-background-1 position-relative"
                            style="background-image: url(/storage/terapia/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                            <div class="g-box_shadow"></div>
                            <div class="terapia-box_title">{{ $c->nome }}</div>
                            <a href="/terapia/{{ $c->ref_amigavel }}" class="terapia-box_btn">Saiba<i
                                    class="bi bi-plus-circle-fill"></i>
                                <div class="terapia-box_mask"></div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <a href="/terapias" class="g-btn-ver-todos">VER TODOS AS TERAPIAS <span>></span> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="flor_mask g-background-1" style="background-image: url('/dist/img/flor_mask.png');"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="all-depoimentos p-geral">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-geral-p d-flex flex-column">
                        <h2 class="title-geral">Depoimentos</h2>
                        <div class="title-geral-traco"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel owl-carousel-depoimento">

                        @foreach ($depoimentos as $d)
                            <div class="item">
                                <div class="depoimentos-box position-relative">
                                    <div class="depoimentos-box_mask g-background-1"
                                        style="background-image: url('/dist/img/mask3.png');">
                                    </div>
                                    <div class="depoimentos-box_content">
                                        <i>{{ $d->mensagem }}</i>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center mt-3">
                                        <div class="depoimentos-box_ico">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="depoimentos-box_name">
                                            <i>{{ $d->nome }}</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>



                {{-- <div class="row">
                  @foreach ($depoimentos as $d)
                      <div class="col-lg-6">
                          <div class="depoimentos-box position-relative">
                              <div class="depoimentos-box_mask g-background-1"
                                  style="background-image: url('/dist/img/mask3.png');">
                              </div>
                              <div class="depoimentos-box_content">
                                  <i>{{ $d->mensagem }}</i>
                              </div>
                              <div class="d-flex justify-content-end align-items-center mt-3">
                                  <div class="depoimentos-box_ico">
                                      <i class="bi bi-person"></i>
                                  </div>
                                  <div class="depoimentos-box_name">
                                      <i>{{ $d->nome }}</i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div> --}}
            </div>
        </div>
    </div>
@stop
