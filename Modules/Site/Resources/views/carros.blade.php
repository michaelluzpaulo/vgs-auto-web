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

        <div class="all-content p-geral">
            <div class="container">
                <div class="row">
                    @foreach ($carro as $c)
                        <div class="col-lg-3 col-6">
                            <a href="/carro/{{ $c->ref_amigavel }}" class="carro-card">
                                <img class="g-background-1 carro-card_img"
                                    style="background-image: url(/storage/carro/big_{{ $c->img }});width: 100%;background-repeat: no-repeat;background-position: center center;">
                                <div class="carro-card_box d-flex flex-column gap-3">
                                    <div class="carro-card_box-categoria">{{ $c->CATEGORIA }}</div>
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
                </div>
            </div>
        </div>




    </main>
@endsection
