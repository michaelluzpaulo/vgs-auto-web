<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Aprove o seu crédito</title>
</head>

<body>
    <p><img style="width: 200px" src="{{ env('MAIL_LOGO') }}" /></p>
    <p>
        <br><b>Veículo(s) que desejo financiar</b><br>
        {{-- <//?php echo nl2br($data['veiculo_desejado']); ?><br> --}}

        <br><b>Dados Pessoais</b><br>
        Assunto: Aprove o seu crédito<br>
        Nome: {{ $data['nome'] }}<br>
        Email: {{ $data['email'] }}<br>
        {{-- RG: {{ $data['rg'] }}<br> --}}
        CPF: {{ $data['documento'] }}<br>
        Data de nascimento: {{ $data['data_nascimento'] }}<br>
        {{-- Local nascimento: {{ $data['local_nascimento'] }}<br> --}}
        {{-- Nome da mãe: {{ $data['nome_mae'] }}<br> --}}
        Telefone: {{ $data['telefone'] }}<br>
        {{-- Possui CNH: {{ $data['possui_cnh'] == 'S' ? 'Sim' : 'Não' }}<br> --}}
        {{-- CEP: {{ $data['cep'] }}<br> --}}
        {{-- Estado: {{ $data['estado'] }}<br> --}}
        {{-- Cidade: {{ $data['cidade'] }}<br> --}}
        {{-- Bairro: {{ $data['bairro'] }}<br> --}}
        {{-- Logradouro: {{ $data['endereco'] }}<br> --}}
        {{-- Número: {{ $data['numero'] }}<br> --}}
        {{-- Complemento: {{ $data['complemento'] }}<br> --}}

        {{-- <br><b>Dados Profissionais</b><br>
        Função / Cargo: {{ $data['cargo'] }}<br>
        Salário: {{ $data['renda'] }}<br> --}}
        Receber promoções e ofertas:
        {{ $data['desejo_receber_promocao_ofertasTxt'] }}<br>

        <br><b>Dados Financeiros</b><br>
        Valor disponível para a entrada: {{ $data['valor_entrada'] }}<br>
        Parcelas: {{ $data['parcelasTxt'] }}<br>

        <br><b>Modelo e ano pretendido</b><br>
        <?php echo nl2br($data['veiculo_obs']); ?><br>
        <br />
    </p>
</body>

</html>
