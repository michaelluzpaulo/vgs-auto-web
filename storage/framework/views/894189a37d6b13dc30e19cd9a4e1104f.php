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
        <?php echo nl2br($data['veiculo_desejado']); ?><br>

        <br><b>Dados Pessoais</b><br>
        Assunto: Financiamento<br>
        Nome: <?php echo e($data['nome']); ?><br>
        Email: <?php echo e($data['email']); ?><br>
        RG: <?php echo e($data['rg']); ?><br>
        CPF: <?php echo e($data['documento']); ?><br>
        Data de nascimento: <?php echo e($data['data_nascimento']); ?><br>
        Local nascimento: <?php echo e($data['local_nascimento']); ?><br>
        Nome da mãe: <?php echo e($data['nome_mae']); ?><br>
        Celular: <?php echo e($data['celular']); ?><br>
        Possui CNH: <?php echo e($data['possui_cnh'] == 'S' ? 'Sim' : 'Não'); ?><br>
        CEP: <?php echo e($data['cep']); ?><br>
        Estado: <?php echo e($data['estado']); ?><br>
        Cidade: <?php echo e($data['cidade']); ?><br>
        Bairro: <?php echo e($data['bairro']); ?><br>
        Logradouro: <?php echo e($data['endereco']); ?><br>
        Número: <?php echo e($data['numero']); ?><br>
        Complemento: <?php echo e($data['complemento']); ?><br>

        <br><b>Dados Profissionais</b><br>
        Função / Cargo: <?php echo e($data['cargo']); ?><br>
        Salário: <?php echo e($data['renda']); ?><br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: <?php echo e($data['valor_entrada']); ?><br>

        <br><b>Observações</b><br>
        <?php echo nl2br($data['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
<?php /**PATH D:\work\www\vgs carros\vgs-auto-web\Modules/Site\Resources/views/emails/financiamento.blade.php ENDPATH**/ ?>