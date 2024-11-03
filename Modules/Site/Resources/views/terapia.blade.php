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
                            <li class="breadcrumb-item active" aria-current="page">Terapia</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas content-artigo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-geral-p d-flex flex-column">
                                    <h2 class="title-geral">{!! $terapia->nome !!}</h2>
                                    <div class="title-geral-traco"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="cursos-box_content">
                                    {!! $terapia->texto !!}
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <br />
                                <div>
                                    <a href="https://wa.me/5511932443316?text=Abordagem%20prática,%20foco%20em%20resultados%20eficientes!"
                                        target="_blanck" class="btn_whatsapp"><i
                                            class="bi bi-whatsapp redes-sociais-ico"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-sm-12">
                        <div class="curso-box_valor position-relative">
                            <div><span>R$ &nbsp;</span>{{ $curso->valor }}</div>
                            <a href="" class="curso-box_valor-inscrever">Inscreva-se</a>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </main>
@endsection
