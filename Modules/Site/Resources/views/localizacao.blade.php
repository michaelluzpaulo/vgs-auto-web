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
                            <li class="breadcrumb-item active" aria-current="page">Localização</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral">
            <div class="container">
                <div class="row">
                    <h1 class="col-12">{!! $institucional->titulo !!}</h1>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <p>{!! $institucional->texto !!}</p>
                    </div>
                    <div class="mt-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.338439718293!2d-51.134098325404665!3d-29.998437029142767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951976fb43be1533%3A0x1ceaac7f2c48d804!2sAv.%20Assis%20Brasil%2C%205971%20-%20Sarandi%2C%20Porto%20Alegre%20-%20RS%2C%2091110-001!5e0!3m2!1spt-BR!2sbr!4v1732036057829!5m2!1spt-BR!2sbr"
                            width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
