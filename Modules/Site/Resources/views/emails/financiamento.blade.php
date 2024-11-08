<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Financiamento</title>
</head>

<body>
    <p><img style="width: 200px" src="{{ env('MAIL_LOGO') }}" /></p>
    <p>
        <br><b>Veículo(s) que desejo financiar</b><br>
        <?php echo nl2br($dados['veiculo_desejado']); ?><br>

        <br><b>Dados Pessoais</b><br>
        Assunto: Financiamento<br>
        Nome: {{ $dados['nome'] }}<br>
        Email: {{ $dados['email'] }}<br>
        RG: {{ $dados['rg'] }}<br>
        CPF: {{ $dados['documento'] }}<br>
        Data de nascimento: {{ $dados['data_nascimento'] }}<br>
        Local nascimento: {{ $dados['local_nascimento'] }}<br>
        Nome da mãe: {{ $dados['nome_mae'] }}<br>
        Celular: {{ $dados['celular'] }}<br>
        Possui CNH: {{ $dados['possui_cnh'] == 'S' ? 'Sim' : 'Não' }}<br>
        CEP: {{ $dados['cep'] }}<br>
        Estado: {{ $dados['estado'] }}<br>
        Cidade: {{ $dados['cidade'] }}<br>
        Bairro: {{ $dados['bairro'] }}<br>
        Logradouro: {{ $dados['endereco'] }}<br>
        Número: {{ $dados['numero'] }}<br>
        Complemento: {{ $dados['complemento'] }}<br>

        <br><b>Dados Profissionais</b><br>
        Função / Cargo: {{ $dados['cargo'] }}<br>
        Salário: {{ $dados['renda'] }}<br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: {{ $dados['valor_entrada'] }}<br>

        <br><b>Observações</b><br>
        <?php echo nl2br($dados['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
