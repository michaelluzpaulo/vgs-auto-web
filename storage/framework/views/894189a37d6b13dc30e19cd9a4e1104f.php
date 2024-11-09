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
        <?php echo nl2br($arr['veiculo_desejado']); ?><br>

        <br><b>Dados Pessoais</b><br>
        Assunto: Financiamento<br>
        Nome: <?php echo e($arr['nome']); ?><br>
        Email: <?php echo e($arr['email']); ?><br>
        RG: <?php echo e($arr['rg']); ?><br>
        CPF: <?php echo e($arr['documento']); ?><br>
        Data de nascimento: <?php echo e($arr['data_nascimento']); ?><br>
        Local nascimento: <?php echo e($arr['local_nascimento']); ?><br>
        Nome da mãe: <?php echo e($arr['nome_mae']); ?><br>
        Celular: <?php echo e($arr['celular']); ?><br>
        Possui CNH: <?php echo e($arr['possui_cnh'] == 'S' ? 'Sim' : 'Não'); ?><br>
        CEP: <?php echo e($arr['cep']); ?><br>
        Estado: <?php echo e($arr['estado']); ?><br>
        Cidade: <?php echo e($arr['cidade']); ?><br>
        Bairro: <?php echo e($arr['bairro']); ?><br>
        Logradouro: <?php echo e($arr['endereco']); ?><br>
        Número: <?php echo e($arr['numero']); ?><br>
        Complemento: <?php echo e($arr['complemento']); ?><br>

        <br><b>Dados Profissionais</b><br>
        Função / Cargo: <?php echo e($arr['cargo']); ?><br>
        Salário: <?php echo e($arr['renda']); ?><br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: <?php echo e($arr['valor_entrada']); ?><br>

        <br><b>Observações</b><br>
        <?php echo nl2br($arr['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
<?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/emails/financiamento.blade.php ENDPATH**/ ?>