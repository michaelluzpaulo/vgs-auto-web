<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="/dist/js/vendorjs/jquery.price_format.2.0.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="all-breadcrumb">
            <div class="container ">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-item-text">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Aprove o seu crédito</li>
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
                        <h1>APROVE O SEU CRÉDITO</h1>
                        <hr>
                        <div class="paceiros">
                            <h3 class="text-center">Parceiros</h3>
                            <div class="d-flex flex-wrap d-flex justify-content-between align-items-center py-4">
                                <a href="https://www.c6bank.com.br/" target="_blank"><img src="/dist/img/logo-c6.jpg"
                                        class="logo-c6" alt="logo c6"></a>
                                <a href="https://www.omni.com.br/" target="_blank"><img src="/dist/img/logo-omni.jpg"
                                        class="logo-parceiros" alt="logo banco omni"></a>
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

                            </div>
                            <p class="text-center mt-3">Facilitamos o pagamento em até 12x no cartão de crédito</p>
                        </div>
                        <br />
                        <p class="mt-4">Envie-nos seus dados para a solicitação de financiamento.</p>
                    </div>
                </div>
                <form class="form-padrao" id="form-financiamento">
                    <div class="row">
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" />
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
                                <label for="data_nascimento" class="form-label">Data nascimento</label>
                                <input type="text" class="form-control" data-mask-type="date" required
                                    name="data_nascimento" id="data_nascimento" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" data-mask-type="telefone" name="telefone"
                                    id="telefone" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <br>
                            <hr />
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="valor_entrada">Valor disponível para a entrada</label>
                                <input type="text" class="form-control" data-mask-type="moeda" name="valor_entrada"
                                    id="valor_entrada" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="parcelas" class="form-label">Parcelas</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="parcelas[]" id="parcelas_24"
                                        value="24X">
                                    <label class="form-check-label" for="parcelas_24">24x</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="parcelas[]" id="parcelas_36"
                                        value="36x">
                                    <label class="form-check-label" for="parcelas_36">36x</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="parcelas[]" id="parcelas_48"
                                        value="48x">
                                    <label class="form-check-label" for="parcelas_48">48x</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="parcelas[]" id="parcelas_60"
                                        value="60x">
                                    <label class="form-check-label" for="parcelas_60">60x</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <br />
                            <div class="g-titulo-1">Modelo e ano pretendido</div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="veiculo_obs" id="veiculo_obs" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="desejo_receber_promocao_ofertas"
                                    name="desejo_receber_promocao_ofertas">
                                <label class="form-check-label" for="desejo_receber_promocao_ofertas">
                                    <strong>Quero receber promoções e ofertas</strong>
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="text-center mt-2">
                                <button type="submit" class="btn g-btn-ver-todos">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Site\Resources/views/financiamento.blade.php ENDPATH**/ ?>