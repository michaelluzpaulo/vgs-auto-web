@extends('site::layouts.master')
@section('js')
    <script src="/dist/js/services/service-cep.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
    <script src="/dist/js/site/Checkout.js?v={{ env('APP_VERSION_ARQUIVE_STATIC') }}"></script>
@endsection
@section('css')
    <style>
        .form-group {
            margin-bottom: 1.2rem;
        }

        .select2-container .select2-selection--single {
            height: 38px;
            padding: 6px 2px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="all-breadcrumb">
            <div class="container ">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-item-text">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">checkout</li>
                        </ol>
                    </nav>
                    <a href="javascript:history.back();" class="breadcrumb-item-text">Voltar</a>

                </div>
            </div>
        </div>

        <div class="p-geral pg-internas content-artigo">
            <div class="container">

                <div class="row" style="margin-bottom: 40px">
                    {{-- <div class="col-lg-4">
                        @if ($cliente)
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Seu login esta ativo como: </h4><br />
                                    <p>Nome: <b>{{ $cliente->nome }}</b></p>
                                    <p>E-mail: <b>{{ $cliente->email }}</b></p>
                                    <br />
                                    <div style="text-align: center">
                                        <a href="/area-restrita" class="btn btn-secondary">
                                            Área Restrita</a>
                                        <a href="/area-restrita/logoff" class="btn btn-secondary">Sair</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Ja tem conta? </h4><br />
                                    <p>Se você já fez compras conosco, insira seus dados nas caixas abaixo. Se você é um
                                        novo
                                        cliente, prossiga para a seção cobrança e envio.</p>
                                </div>
                            </div>

                            <form id="form-login">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="login_email" class="control-label">E-mail *: </label>
                                            <input type="email" class="form-control" name="email" id="login_email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="login_senha" class="control-label">Senha *: </label>
                                            <input type="password" class="form-control" name="senha" id="login_senha">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <br />
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" id="btn-submit">
                                                Logar</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <br />
                                        <a href="/area-restrita/nova-senha" class="btn btn-link">Perdeu sua senha?</a>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="col-lg-1" style="text-align: center">
                        <div style="height: 100%;border-left:1px dashed #3D71B8;width:10px;margin:auto"></div>
                    </div> --}}
                    <div class="col-lg-12">

                        <div class="checkout-review-order">
                            <h4>Seu pedido </h4><br />
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="t-product-name">Curso</th>
                                        <th class="product-total" style="width: 140px;text-align:right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="t-product-name">
                                            <?php echo $objCurso->nome; ?>
                                            </strong>
                                        </td>
                                        <td style="text-align:right">
                                            <?php
                                            $subtotal = $objCurso->valor > 0 ? $objCurso->valor * 1 : 0;
                                            echo $subtotal > 0 ? "R$ " . __currency_mysql_to_iso($subtotal) : 'Gratuito';
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $descontoBruto = 0;
                                    $descontoBf = !$cupom ? 0 : $cupom['desconto'];
                                    ?>
                                    <tr>
                                        <td>Cupom de desconto
                                            <span id="get-percentual-desconto">(
                                                {{ $descontoBf }} %)
                                            </span>
                                        </td>
                                        <td style="text-align:right">
                                            <span id="get-desconto-valor">
                                                <?php
                                                $descontoBruto = ($descontoBf / 100) * $subtotal;
                                                echo "R$ " . __currency_mysql_to_iso($descontoBruto);
                                                ?>
                                            </span>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <td><b>Total</b></td>
                                        <td style="text-align:right">
                                            <strong>R$ <span id="set-valor-total">
                                                    <?php
                                                    echo __currency_mysql_to_iso($subtotal - $descontoBruto); ?>
                                                </span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <br>
                            <div class="checkout-payment">
                                <div align="center">
                                    @if (!$cupom && $subtotal > 0)
                                        <p>
                                            Cupom de desconto: <input type="text" name="codigo" id="get-checkout-cupom"
                                                value="">
                                            <a href="javascript:;;" onclick="Checkout.addCupom()" class="btn btn-success">
                                                Adicionar</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <form id="form-checkout-transacao">

                    <input type="hidden" name="curso_id" value="<?php echo $objCurso->id; ?>">
                    <input type="hidden" name="subtotal" id="get-subtotal" value="<?php echo $subtotal; ?>">
                    <input type="hidden" name="desconto" id="get-desconto" value="<?php echo $descontoBruto; ?>">

                    <div class="row">
                        <div class="col-lg-12" style="text-align: center">
                            <div style="height: 10px;border-top:1px dashed #3D71B8;width:100%;margin-top:5px"></div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Detalhes de cobrança </h4><br>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nome" class="control-label">Seu nome *: </label>
                                <input type="tet" class="form-control" name="nome" id="nome"
                                    value="<?php echo $cliente->nome ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="control-label">E-mail *: </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="<?php echo $cliente->email ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="cpf" class="control-label">CPF *: </label>
                                <input type="text" class="form-control" name="cpf" id="cpf"
                                    data-mask-type="cpf" value="<?php echo $cliente->cpf ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="telefone" class="control-label">Telefone / Whats *: </label>
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                    data-mask-type="telefone" value="<?php echo $cliente->telefone ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="data_nascimento" class="control-label">Data nascimento *: </label>
                                <input type="text" class="form-control" name="data_nascimento" id="data_nascimento"
                                    data-mask-type="date" value="<?php echo isset($cliente->data_nascimento) ? __date_mysql_to_iso($cliente->data_nascimento) : ''; ?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cep" class="control-label">CEP *: </label>
                                <input type="text" class="form-control" name="cep" id="cep"
                                    data-mask-type="cep" value="<?php echo $endereco->cep ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cep" class="control-label">Estado: </label>
                                <select class="form-control " name="uf" id="uf" data-cep="uf">
                                    <option value="">SELECIONE...</option>
                                    @foreach ($estados as $d)
                                        <?php
                                        $view_endereco['uf'] = $endereco->uf ?? $view_endereco['uf'];
                                        $selected = $view_endereco['uf'] == $d->uf ? ' selected ' : '';
                                        echo "<option value='{$d->uf}' {$selected}>{$d->uf}</option>";
                                        ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cep" class="control-label">Cidade: </label>
                                <select class="modify-select form-control" name="cidade_id" id="cidade_id"
                                    data-cep="cidade">
                                    <option value="">SELECIONE...</option>
                                    @foreach ($cidades as $d)
                                        <?php
                                        $view_endereco['cidade_id'] = $endereco->cidade_id ?? $view_endereco['cidade_id'];
                                        $selected = $view_endereco['cidade_id'] == $d->id ? ' selected ' : '';
                                        echo "<option value='{$d->id}'  {$selected}>{$d->nome}</option>";
                                        ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cep" class="control-label">Bairro *: </label>
                                <input type="text" class="form-control" name="bairro" id="bairro"
                                    data-cep="bairro" value="<?php echo $endereco->bairro ?? ''; ?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="logradouro" class="control-label">Logradouro (* Rua Santa Maria ....) *:
                                </label>
                                <input type="text" class="form-control" name="logradouro" id="logradouro"
                                    data-cep="endereco" value="<?php echo $endereco->logradouro ?? ''; ?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="numero" class="control-label">Número *: </label>
                                <input type="text" class="form-control" name="numero" id="numero"
                                    value="<?php echo $endereco->numero ?? ''; ?>">
                            </div>
                        </div>

                        <div class="col-lg-12" style="text-align: center">
                            <br />
                            <div class="form-group">

                                <button class="btn btn-success" type="submit">
                                    Finalizar Pagamento
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
