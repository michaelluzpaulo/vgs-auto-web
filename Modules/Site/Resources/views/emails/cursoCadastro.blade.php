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
    Estamos muito felizes em tê-lo(a) conosco no <?php echo $data['CURSO']; ?>!<br>
    Parabéns por tomar a decisão de investir em seu desenvolvimento e aprendizado.<br><br>

    <b>O que esperar do curso:</b><br>
    - Aulas Didáticas: Aulas detalhadas, com acompanhamento em slides para melhor memorização e aprendizado.<br>
    - Conteúdo Diferenciado: materiais exclusivos, com apostilas e exercícios que vão aprofundar e complementar seu
    conhecimento.<br>
    - Acompanhamento e Suporte: Nossa equipe está à disposição para tirar suas dúvidas e auxiliar no que for
    necessário.<br><br>

    <b>Dicas para aproveitar ao máximo:</b><br>
    1. Organize seu tempo: Reserve um horário na sua agenda para estudar e acompanhar as aulas.
    <br>
    2. Tire suas dúvidas: Não fique com dúvidas sobre o material estudado, mande sua dúvida que estaremos prontos
    para lhe auxiliar.
    <br>
    3. Utilize os benefícios: Assista as aulas quantas vezes achar necessário, baixe seu material pdf para tê-lo
    quando precisar, pratique os exercícios disponíveis.
    <br>
    4. Aproveite os recursos extras: Não deixe de explorar os materiais complementares disponíveis.
    <br><br>

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
