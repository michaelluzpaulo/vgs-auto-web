@extends('site::layouts.master')
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
@endsection

@section('content')
    <main>
        <div class="all-breadcrumb">
            <div class="container ">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-item-text">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Terapias</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas">
            <div class="container">
                <div class="row">
                    @foreach ($terapias as $c)
                        <div class="col-lg-4 col-6">
                            <div class="terapia-box g-background-1 position-relative"
                                style="background-image: url(/storage/terapia/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                                <div class="terapia-box_title">{{ $c->nome }}</div>
                                <a href="/terapia/{{ $c->ref_amigavel }}" class="terapia-box_btn">Saiba<i
                                        class="bi bi-plus-circle-fill"></i>
                                    <div class="terapia-box_mask"></div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>




    </main>
@endsection
