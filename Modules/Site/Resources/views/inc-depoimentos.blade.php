@section('js')
    <script>
        $('.owl-carousel-depoimento').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@stop


<div class="all-depoimentos p-geral">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-geral-p d-flex flex-column">
                    <h2 class="title-geral">Depoimentos</h2>
                    <div class="title-geral-traco"></div>
                </div>
            </div>
            {{-- <div class="col-lg-12">
                <div class="owl-carousel-depoimento owl-carousel owl-theme">
                    <div class="item" style="">
                        <h4>1</h4>
                    </div>
                    <div class="item">
                        <h4>2</h4>
                    </div>
                    <div class="item">
                        <h4>3</h4>
                    </div>
                    <div class="item">
                        <h4>4</h4>
                    </div>
                    <div class="item">
                        <h4>5</h4>
                    </div>
                    <div class="item">
                        <h4>6</h4>
                    </div>
                    <div class="item">
                        <h4>7</h4>
                    </div>
                    <div class="item">
                        <h4>8</h4>
                    </div>
                    <div class="item">
                        <h4>9</h4>
                    </div>
                    <div class="item">
                        <h4>10</h4>
                    </div>
                    <div class="item">
                        <h4>11</h4>
                    </div>
                    <div class="item">
                        <h4>12</h4>
                    </div>
                </div>
            </div> --}}



            <div class="row">
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
            </div>
        </div>
    </div>
</div>
