<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CONTATO</title>
</head>

<body>
    <p><img style="width: 200px" src="{{ env('MAIL_LOGO') }}" /></p>
    <br><br>
    Olá <?php echo $data['nome']; ?>,
    Estamos muito felizes em tê-lo(a) conosco no <?php echo $data['CURSO']; ?>!<br><br>

    <b>O curso possui:</b><br>
    - Aulas aulas didáticas, com apostilas e material de apoio que vão aprofundar e complementar seu conhecimento.<br>
    - Nossa equipe está à disposição para tirar suas dúvidas no que for necessário.<br><br>

    <p align='center'><b>Segue abaixo seu login e senha para acesso:</b></p>
    E-mail: <?php echo $data['email']; ?><br>
    Senha: <?php echo $data['password']; ?><br>
    Para acessar o curso, basta <a href="https://cursoseterapiasintegradas.com.br/area-restrita-aluno/login">clicar
        aqui</a> e começar sua jornada de aprendizado!
    <br><br />

    Se tiver qualquer dúvida ou precisar de ajuda, não hesite em nos contatar através do e-mail:
    <a href='mailto:contato@cursoseterapiasintegradas.com.br'>contato@cursoseterapiasintegradas.com.br</a> ou pelo
    whatsapp: (011) 93244-3316.<br />
    Estamos aqui para garantir que sua experiência seja incrível.<br />
    Aproveite ao máximo o curso e bons estudos!<br />
    Atenciosamente,<br /><br />

    <p align='center'>
        <b>Suélen Pereira</b><br />
        <b>Diretora</b><br />
        <b>Cursos e Terapias Integradas</b>
    </p>


    <br />
</body>

</html>
