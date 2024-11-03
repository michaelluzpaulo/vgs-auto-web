@extends('site::layouts.master')
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="/dist/js/site/CursoCadastroSimplificado.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
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
                            <li class="breadcrumb-item active" aria-current="page">Curso</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas content-artigo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-geral-p d-flex flex-column">
                                    <h2 class="title-geral">{!! $curso->nome !!}</h2>
                                    <div class="title-geral-traco"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="cursos-box_content">
                                    {!! $curso->texto !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        @if ($curso->valor == '0.00')
                            <div class="curso-box_free">
                                <div class="curso-box_free_valor">Gratuito</div>
                                <form action="" id="form-curso-simplificado" class="px-2">
                                    <input type="hidden" class="form-control" name="curso_id"
                                        value="{{ $curso->id }}" />
                                    <div class="row gap-3">
                                        <div class="col-12">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" data-mask-type="cpf" class="form-control" id="cpf"
                                                name="cpf" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <input type="text" data-mask-type="telefone" class="form-control"
                                                id="telefone" name="telefone" required>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="S"
                                                    id="receberNews" name="receberNews">
                                                <label class="form-check-label" for="receberNews">
                                                    <small>Desejo receber ofertas no meu e-mail</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p style="font-size: 14px">* Uma senha será enviada para seu e-mail para acessar
                                                a área do
                                                aluno</p>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn inscrever-btn curso-box-free_inscrever">Inscrever-se</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @elseif ($curso->valor == 0.01)
                            <div class="curso-box_valor position-relative">
                                <div><span>R$ &nbsp;</span>Em breve</div>
                                <a href="" class="curso-box_valor-inscrever">Em breve</a>
                            </div>
                        @else
                            <div class="curso-box_valor position-relative">
                                <div><span>R$ &nbsp;</span>{{ $curso->valor }}</div>
                                <a href="/checkout/{{ $curso->id }}" class="curso-box_valor-inscrever">Inscrever-se</a>
                            </div>
                        @endif


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
                                        href="/storage/curso/big_{{ $g->img }}">
                                        <img src="/storage/curso/tmb_{{ $g->img }}" alt="{{ $g->legenda }}"
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
