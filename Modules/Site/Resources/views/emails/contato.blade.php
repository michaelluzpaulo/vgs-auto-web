<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CONTATO</title>
</head>

<body>
    <p><img style="width: 200px" src="{{ env('MAIL_LOGO') }}" /></p>
    <p>
        DADOS<br>
        Nome: <?php echo $data['nome']; ?><br>
        E-mail: <?php echo $data['email']; ?><br>
        Telefone: <?php echo $data['telefone']; ?><br>
        Mensagem:<br><?php echo $data['mensagem']; ?><br>
        <br />
    </p>
</body>

</html>
