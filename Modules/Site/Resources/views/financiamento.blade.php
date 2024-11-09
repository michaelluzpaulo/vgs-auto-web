@extends('site::layouts.master')
@section('css')

@stop

@section('js')
    <script type="text/javascript" src="/dist/js/vendorjs/jquery.price_format.2.0.min.js"></script>
@stop

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
                    <div class="col-lg-12">
                        <h1>FINANCIAMENTO</h1>
                        <hr>
                        <div class="paceiros">
                            <h3 class="text-center">Parceiros</h3>
                            <div class="d-flex flex-wrap d-flex justify-content-between align-items-center py-4">
                                <a href="https://www.santander.com.br/hotsite/santanderfinanciamentos/" target="_blank"><img
                                        src="/dist/img/logo-santander.png" class="logo-parceiros"
                                        alt="logo banco santander"></a>
                                <a href="https://www.itau.com.br/emprestimos-financiamentos/veiculos/" target="_blank"><img
                                        src="/dist/img/logo-itau.png" class="logo-parceiros" alt="logo banco itau"></a>
                                <a href="https://financiamentos.bradesco/html/home.shtm" target="_blank"><img
                                        src="/dist/img/logo-bradesco.png" class="logo-parceiros"
                                        alt="logo banco bradesco"></a>
                                <a href="https://www.bv.com.br/" target="_blank"><img src="/dist/img/logo-bvfinanceira.png"
                                        class="logo-parceiros" alt=""></a>
                                <a href="https://www.bancodigimais.com.br/home" target="_blank"><img
                                        src="/dist/img/logo-bancorenner.png" class="logo-parceiros"
                                        alt="logo banco renner"></a>
                                <a href="https://www.bancopan.com.br/" target="_blank"><img
                                        src="/dist/img/logo-bancopan.png" class="logo-parceiros" alt="logo banco pan"></a>
                            </div>
                            <p class="text-center mt-3">Facilitamos o pagamento em até 18x no cartão de crédito</p>
                        </div>
                        <br />
                        <p class="mt-4">Envie-nos seus dados para a solicitação de financiamento.</p>
                    </div>
                </div>
                <form class="form-padrao" id="form-financiamento">
                    <div class="row">
                        <div class="col-lg-12">
                            <br />
                            <div class="g-titulo-1">Veículo(s) que desejo financiar</div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="veiculo_desejado" id="veiculo_desejado" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <br />
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="valor_entrada">Valor disponível para a entrada</label>
                                <input type="text" class="form-control" data-mask-type="moeda" name="valor_entrada"
                                    id="valor_entrada" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-4">Dados pessoais</div>
                        </div>
                        <div class="col-lg-12">
                            <hr />
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" required />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="documento" class="form-label">CPF</label>
                                <input type="text" class="form-control" data-mask-type="cpf" required name="documento"
                                    id="documento" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" class="form-control" name="rg" id="rg" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nome_mae" class="form-label">Nome da mãe</label>
                                <input type="text" class="form-control" name="nome_mae" id="nome_mae" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="data_nascimento" class="form-label">Data nascimento</label>
                                <input type="text" class="form-control" data-mask-type="date" required
                                    name="data_nascimento" id="data_nascimento" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="local_nascimento" class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" name="local_nascimento"
                                    id="local_nascimento" />
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="possui_cnh" class="form-label">Possui CNH</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="possui_cnh_s"
                                        value="S">
                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="possui_cnh" id="possui_cnh_n"
                                        value="N" checked>
                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="cargo" class="form-label">Função / Cargo</label>
                                <input type="text" class="form-control" name="cargo" id="cargo" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="renda" class="form-label">Salário</label>
                                <input type="text" class="form-control" data-mask-type="moeda" name="renda"
                                    id="renda" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" data-mask-type="telefone" name="celular"
                                    id="celular" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mt-4">Dados endereço</div>
                        </div>
                        <div class="col-lg-12">
                            <hr />
                        </div>


                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="cep" class="form-label">CEP residencial</label>
                                <input type="text" class="form-control" data-mask-type="cep" name="cep"
                                    id="cep" data-cep='cep' />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="endereco" class="form-label">Logradouro</label>
                                <input type="text" class="form-control" name="endereco" id="endereco"
                                    data-cep='endereco' />
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" name="numero" id="numero" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" name="complemento" id="complemento" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro"
                                    data-cep='bairro' />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" name="cidade" id="cidade"
                                    data-cep='cidade' />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estado" id="estado"
                                    data-cep='uf' />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <br />
                            <div class="g-titulo-1">Observações</div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="veiculo_obs" id="veiculo_obs" rows="8"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="text-center">
                                <button type="submit" class="btn g-btn-ver-todos">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
