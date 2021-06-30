<?php
    $url = preg_replace('/^(\/{0,1})public(\/{0,1})/', '', $_SERVER['REDIRECT_URL']);
    $dado = explode('|', base64_decode($url));

    $nome = preg_replace('/[^a-zA-Z0-9à-úÀ-Ú\ ]/', '', $dado[0] ?? '');
    $data = $dado[1] ?? '';

    $data = preg_match(
        "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])\ ([0-1][0-9]|2[0-3]):(0[0-9]|[1-5][0-9]):(0[0-9]|[1-5][0-9])$/",
        $data
    ) ? $data : '';

    if(empty($nome) || empty($data)) {
        require_once '404.php';
        exit();
    }

    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $titulo = $nome. ' não fala mal do Bozo';
    $descricao = 'Veja quanto tempo seu amigo não fala mal do Bozo';
    $imagem = 'social.png';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="twitter:card" value="summary">
    <meta name="twitter:site" content="<?=$url?>">
    <meta name="twitter:title" content="<?=$titulo?>">
    <meta name="twitter:description" content="<?=$descricao?>">
    <meta name="twitter:creator" content="<?=$titulo?>">
    <meta name="twitter:image" content="<?=$imagem?>">
    <meta property="og:title" content="<?=$titulo?>" />
    <meta property="og:url" content="<?=$url?>" />
    <meta property="og:image" content="<?=$imagem?>" />
    <meta property="og:description" content="<?=$descricao?>" />

    <link rel="icon" href="favicon.png" type="image/png">

    <title><?=$titulo?></title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script src="range.js"></script>
    <script src="contador.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="layout.css">
</head>

<body>

    <div id="site">
        <figure><img src="logo.png" alt="Nariz e bigode de palhaço"></figure>
        <h1>
            Contador de tempo que meu amigo
            <strong><?=$nome?></strong>
            está sem falar mal do Bozo.
        </h1>
        <div class="contador">
            <div class="bloco">
                <div id="dia"></div>
                <p>Dia</p>
            </div>
            <div class="bloco">
                <div id="hora"></div>
                <p>Horas</p>
            </div>
            <div class="bloco">
                <div id="minuto"></div>
                <p>Minutos</p>
            </div>
            <div class="bloco">
                <div id="segundo"></div>
                <p>Segundos</p>
            </div>
        </div>
    </div>

    <form action="/">
        <input type="hidden" id="data" value="<?= $data ?>">
    </form>
</body>

</html>
