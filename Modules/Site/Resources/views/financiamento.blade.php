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
                            <li class="breadcrumb-item active" aria-current="page">Financiamento</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral">
            <div class="container">
                <div class="row">
                    <P>GGGG</P>
                </div>
            </div>
        </div>
    </main>
@endsection
