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
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo $institucional->titulo; ?></li>
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
                            <h2 class="title-geral"><?php echo $institucional->titulo; ?></h2>
                            <div class="title-geral-traco"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="pg-internas_texto">
                            <?php echo $institucional->texto; ?>
                        </div>
                    </div>
                </div>
            </div>
            @if ($galeria && count($galeria) > 0)
                <section class="galeria_fotos">
                    <div class="container">
                        <div class="row">
                            @foreach ($galeria as $g)
                                <div class="col-lg-3">
                                    <a data-fancybox="gallery" data-caption="{{ $g->legenda }}"
                                        href="/storage/institucional/big_{{ $g->img }}">
                                        <img src="/storage/institucional/tmb_{{ $g->img }}" alt="{{ $g->legenda }}"
                                            title="{{ $g->legenda }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

        </div>
    </main>
@endsection
