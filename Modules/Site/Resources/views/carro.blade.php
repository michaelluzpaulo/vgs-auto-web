@extends('site::layouts.master')
@section('js')
    <script src="/shared/lightbox2/dist/js/lightbox.min.js"></script>
    <script>
        @if ($carro->vendido == 'S')
            document.querySelector('.nav-link-2').classList.add("active");
        @else
            document.querySelector('.nav-link-1').classList.add("active");
        @endif
    </script>
@endsection
@section('css')
    <link href="/shared/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
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

        <div class="p-geral" id="pg-carro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <figure class="zommcontainer">
                            <img src="/storage/carro/big_{{ $carro->img }}" class="modify-img-principal"
                                style="width: 100%">
                        </figure>
                        <div class="desktop">
                            <div class="row m-0 ">
                                @if (count($carroFotos) > 0)
                                    @foreach ($carroFotos as $foto)
                                        <div class=" col-lg-3 col-md-6 col-sm-4">
                                            <figure class="thumb-selector">
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
                            {{-- @if ($carro->vendido == 'S')
                                VENDIDO
                            @else
                                R$ <//?php echo __currency_mysql_to_iso($carro->valor); ?>
                            @endif --}}
                            @if ($carro->status == 'D')
                                R$ <?php echo __currency_mysql_to_iso($carro->valor); ?>
                            @endif
                            @if ($carro->status == 'R')
                                RESERVADO
                            @endif
                            @if ($carro->status == 'V')
                                VENDIDO
                            @endif
                        </div>
                        <div class="descricao-produto">
                            <div class="descricao-produto-group">
                                <table>
                                    <tr>
                                        <th>Marca</th>
                                        <td style="text-transform: uppercase">{{ $categoria->nome }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td style="text-transform: uppercase">{{ $carro->titulo }}</td>
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
                                        <th>Km</th>
                                        <td>{{ $carro->km }}</td>
                                    </tr>
                                    <tr>
                                        <th>Câmbio</th>
                                        <td>{{ $carro->cambio }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="/aprove-seu-credito" class="pg-carro_aprove_credito">Aprove o seu crédito</a>
                            </div>
                            <p>{!! $carro->texto !!}</p>
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
