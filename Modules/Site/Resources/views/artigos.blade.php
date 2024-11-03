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
                            <li class="breadcrumb-item active" aria-current="page">Artigos</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-geral-p d-flex flex-column">
                            <h2 class="title-geral">Artigos</h2>
                            <div class="title-geral-traco"></div>
                        </div>
                    </div>
                    @foreach ($artigos as $a)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <a href="/artigo/{{ $a->ref_amigavel }}" class="artigos_box">
                                <h2>{!! __str_limit_crop_word($a->titulo, 64) !!}</h2>
                                <div class="artigos_box-divider"></div>
                                <div class="artigos_box-content">{!! __str_limit_crop_word(strip_tags($a->texto), 200) !!}</div>
                                <div class="d-flex justify-content-end mt-4">
                                    <div class="artigos_box-bnt"><span>+</span> LEIA MAIS</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
