<div class="footer-menu p-geral">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-5">
                <a class="footer-menu_logo" href="/">
                    <img src="{{ env('APP_LOGO_HEADER') }}" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-1">
                <div class="footer-menu_menu">
                    <div class="d-flex flex-column mb-2">
                        <h2 class="title-geral">Links</h2>
                        <div class="title-geral-traco"></div>
                    </div>
                    <nav>
                        <ul class="nav">
                            @include('site::inc-menu')
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-menu_contato">
                    <div class="mb-2 d-flex flex-column">
                        <h2 class="title-geral">Contate-nos</h2>
                        <div class="title-geral-traco"></div>
                    </div>
                    <div class="d-flex flex-column">
                        <div><i class="bi bi-telephone-fill"></i>(11) 93244 3316</div>
                        <div class="mt-2 d-flex align-items-center"><i class="bi bi-envelope-fill"></i>
                            <div class="footer_email">contato@cursoseterapiasintegradas.com.br</div>
                        </div>
                        <div class="d-flex mt-2">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div class="footer_email">Av. Giovanni Gronchi, 5201 - Vila Andrade -
                                <br> São Paulo - SP
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="all-footer">Terapias Integradas © 2023.Todos os diretos reservados.</div>
