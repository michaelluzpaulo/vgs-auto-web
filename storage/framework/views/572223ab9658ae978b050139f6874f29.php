<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Financiamento</title>
</head>

<body>
    <p><img style="width: 200px" src="<?php echo e(env('MAIL_LOGO')); ?>" /></p>
    <p>
        <br><b>Veículo(s) que desejo financiar</b><br>
        <?php echo nl2br($dados['veiculo_desejado']); ?><br>

        <br><b>Dados Pessoais</b><br>
        Assunto: Financiamento<br>
        Nome: <?php echo e($dados['nome']); ?><br>
        Email: <?php echo e($dados['email']); ?><br>
        RG: <?php echo e($dados['rg']); ?><br>
        CPF: <?php echo e($dados['documento']); ?><br>
        Data de nascimento: <?php echo e($dados['data_nascimento']); ?><br>
        Local nascimento: <?php echo e($dados['local_nascimento']); ?><br>
        Nome da mãe: <?php echo e($dados['nome_mae']); ?><br>
        Celular: <?php echo e($dados['celular']); ?><br>
        Possui CNH: <?php echo e($dados['possui_cnh'] == 'S' ? 'Sim' : 'Não'); ?><br>
        CEP: <?php echo e($dados['cep']); ?><br>
        Estado: <?php echo e($dados['estado']); ?><br>
        Cidade: <?php echo e($dados['cidade']); ?><br>
        Bairro: <?php echo e($dados['bairro']); ?><br>
        Logradouro: <?php echo e($dados['endereco']); ?><br>
        Número: <?php echo e($dados['numero']); ?><br>
        Complemento: <?php echo e($dados['complemento']); ?><br>

        <br><b>Dados Profissionais</b><br>
        Função / Cargo: <?php echo e($dados['cargo']); ?><br>
        Salário: <?php echo e($dados['renda']); ?><br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: <?php echo e($dados['valor_entrada']); ?><br>

        <br><b>Observações</b><br>
        <?php echo nl2br($dados['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
<?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/emails/contato.blade.php ENDPATH**/ ?>