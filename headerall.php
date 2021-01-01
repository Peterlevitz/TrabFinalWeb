<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/geral.css" />
    <link rel="stylesheet" type="text/css" href="../css/ranking.css" />
    <script src="../js/jogo.js"></script>
    <script src="../js/tabuleiro.js"></script>
    <title>Rolling Tetris</title>
</head>

<body>
    <nav class="barra-principal">
        <ul class="menu alinhamento-horizontal">
            <li class="item-menu"><a href="main.php">Inicio</a></li>
            <li class="item-menu"><a href="rankingGlobal.php">Ranking</a></li>
        </ul>
        <div class="dropdown">
            <div class="dropbtn alinhamento-horizontal card-usuario">
                <div class="usuario">Nome</div>
                <img src="../img/usuario.png" alt="foto-usuario" class="imagem-usario">
            </div>
            <div class="dropdown-content">
                <a href="cadastro.php">
                    <img src="../img/edit-icon.png" alt="icone-edite" class="icone"> - Editar
                </a>
                <a href="../logout.php">
                    <img src="../img/logout-icon.png" alt="icone-edite" class="icone"> - Logout
                </a>
            </div>
        </div>
    </nav>
