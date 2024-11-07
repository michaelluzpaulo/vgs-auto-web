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
                            <li class="breadcrumb-item active" aria-current="page">Vitrine</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas content-artigo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="zommcontainer mt-3 ">
                            <img src="/storage/carro/big_{{ $carro->img }}" class="modify-img-principal"
                                style="width: 100%">
                        </figure>
                        <div class="desktop">
                            <div class="row m-0 ">

                                @if (count($carroFotos) > 0)
                                    @foreach ($carroFotos as $foto)
                                        <div class=" col-lg-3 col-md-6 col-sm-4 p-2">
                                            <figure class="thumb-selector g-transparencia">
                                                <a href="/storage/carro/big_{{ $foto->img }}" title="<?php echo $foto['legenda']; ?>"
                                                    style="display: block" class="galeria-img amplia-imagem">
                                                    <img src="/storage/carro/tmb_{{ $foto->img }}" />
                                                </a>
                                            </figure>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="valor-produto text-center">
                            @if ($carro->vendido == 'S')
                                VENDIDO
                            @else
                                <?php echo $carro->valor; ?>
                            @endif
                        </div>
                        <div class="descricao-produto">
                            <div class="descricao-produto-group">
                                <table>
                                    <tr>
                                        <th>Marca</th>
                                        <td>{{ $categoria->nome }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cor</th>
                                        <td>{{ $carro->cor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ano</th>
                                        <td>{{ $carro->ano }}</td>
                                    </tr>
                                    <tr>
                                        <th>Combustível</th>
                                        <td>{{ $carro->combustivel }}</td>
                                    </tr>
                                    <tr>
                                        <th>Motorização</th>
                                        <td>{{ $carro->motorizacao }}</td>
                                    </tr>
                                    <tr>
                                        <th>Câmbio</th>
                                        <td>{{ $carro->cambio }}</td>
                                    </tr>
                                </table>
                            </div>
                            {!! $carro->texto !!}
                        </div>
                        <div class="atendimento-whatsapp pt-4 text-center">
                            <img src="/img/site/atendimento-whats.png" title="Atendimento" />
                            <br />
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=5551981640439&text=Ol%C3%A1%2C%20visitei%20o%20site%20da%20Auto%20Top%20Multimarcas%20e%20gostaria%20de%20receber%20mais%20informa%C3%A7%C3%B5es"
                                class="telefone text-dark">(51) 98164 0439</a>
                            <br />
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=5551999260123&text=Ol%C3%A1%2C%20visitei%20o%20site%20da%20Auto%20Top%20Multimarcas%20e%20gostaria%20de%20receber%20mais%20informa%C3%A7%C3%B5es"
                                class="telefone text-dark">(51) 99926 0123</a>
                        </div>
                    </div>

                    <div class="col-lg-6 mobile">
                        <div class="d-flex flex-wrap">
                            @if (count($carroFotos) > 0)
                                @foreach ($carroFotos as $foto)
                                    <div class="col-4 p-2">
                                        <figure class="thumb-selector g-transparencia">
                                            <a href="/storage/carro/big_{{ $foto->img }}" title="<?php echo $foto['legenda']; ?>"
                                                style="display: block" class="galeria-img amplia-imagem">
                                                <img src="/storage/carro/tmb_{{ $foto->img }}" />
                                            </a>
                                        </figure>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
