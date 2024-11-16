<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Aprove o seu crédito</title>
</head>

<body>
    <p><img style="width: 200px" src="<?php echo e(env('MAIL_LOGO')); ?>" /></p>
    <p>
        <br><b>Veículo(s) que desejo financiar</b><br>
        

        <br><b>Dados Pessoais</b><br>
        Assunto: Aprove o seu crédito<br>
        Nome: <?php echo e($data['nome']); ?><br>
        Email: <?php echo e($data['email']); ?><br>
        
        CPF: <?php echo e($data['documento']); ?><br>
        Data de nascimento: <?php echo e($data['data_nascimento']); ?><br>
        
        
        Telefone: <?php echo e($data['telefone']); ?><br>
        
        
        
        
        
        
        
        

        
        Receber promoções e ofertas:
        <?php echo e($data['desejo_receber_promocao_ofertasTxt']); ?><br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: <?php echo e($data['valor_entrada']); ?><br>
        Parcelas: <?php echo e($data['parcelasTxt']); ?><br>

        <br><b>Modelo e ano pretendido</b><br>
        <?php echo nl2br($data['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
<?php /**PATH D:\work\www\vgs_carros\vgs-auto-web\Modules/Site\Resources/views/emails/financiamento.blade.php ENDPATH**/ ?>