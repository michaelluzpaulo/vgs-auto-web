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
                            <li class="breadcrumb-item active" aria-current="page">Contato</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas pg-contato">
            <div class="container">

                <form id="form-contato">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="title-geral-p d-flex flex-column">
                                <h2 class="title-geral">Contato</h2>
                                <div class="title-geral-traco"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p>Preencha o formulário e responderemos prontamente.</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-12">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" data-mask-type="telefone" class="form-control" id="telefone"
                                name="telefone">
                        </div>
                        <div class="col-12">
                            <label for="mensagem" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn contato-btn">Enviar</button>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="row py-5">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="d-flex contato-card gap-2">
                            <i class="bi bi-geo-alt contato-card-ico"></i>
                            <div>
                                <div class="contato-card-title">Endereço</div>
                                <address class="contato-card-title text-black">Av. Giovanni Gronchi, 5201 - Vila Andrade -
                                    São
                                    Paulo
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="d-flex contato-card gap-3">
                            <div class="bi bi-telephone contato-card-ico"></div>
                            <div>
                                <div class="contato-card-title">Telefone</div>
                                <div class="contato-card-telefone">+55 (11) 93244 3316</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="d-flex contato-card gap-3">
                            <i class="bi bi-envelope contato-card-ico"></i>
                            <div>
                                <div class="contato-card-title">Email</div>
                                <div>terapia@terapia.com.br</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-maps">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.4820366451154!2d-46.73607912571086!3d-23.622902163853965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce514c7fdc0d27%3A0xb5b8589507a34e77!2sAv.%20Giovanni%20Gronchi%2C%205201%20-%20Vila%20Andrade%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005724-003!5e0!3m2!1spt-BR!2sbr!4v1713135173085!5m2!1spt-BR!2sbr"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>


    </main>
@endsection
