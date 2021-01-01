<!DOCTYPE html>
<html lang="pt">

<head>
    <title> Rolling Tetris</title>
    <meta charset="UTF-8" />
            <link type="text/css" rel="stylesheet" href="../css/estilocad.css">
<link type="text/css" rel="stylesheet" href="../css/geral.css">

</head>

<body>
        <header>
            <img src="../img/logoR.png" alt="Rolling" class="rolling imageRanking">
            <img src="../img/logoT.png" alt="Tetris" class="imageRanking">
        </header>
        <form action="../confirmcad.php" method="post">
            <fieldset>
                <h1 class="cadname">Cadastro</h1>
                <div class="row">
                    <div class="field">
                        <label for="nome"><b>Nome completo </b></label><br>
                        <input  name="nome" id="nome" class="form" type="text" placeholder="Insira seu nome" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="data"><b>Data de nascimento </b></label><br>
                        <input name="data" id="data" class="form" type="date" required>
                    </div>
                    <div class="field">
                        <label for="cpf"><b>CPF </b></label><br>
                        <input name="cpf" id="cpf" class="form" type="text" placeholder="Insira seu CPF" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="tel"><b>Telefone</b></label><br>
                        <input name="tel" id="tel" class="form" type="text" placeholder="Insira seu telefone" required>
                    </div>
                    <div class="field">
                        <label for="user"><b>Username</b></label><br>
                        <input name="user" id="user" class="form" type="text" placeholder="Insira seu username" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="email"><b>Email</b></label><br>
                        <input name="email" id="email" class="form" type="email" placeholder="Insira seu email" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="senha"><b>Senha</b></label><br>
                        <input name="senha" id="senha" class="form" type="password" placeholder="Insira a sua senha" required>
                    </div>

                    <div class="field">
                        <label for="senha2"><b>Repita a sua senha</b></label><br>
                        <input name="senha2" id="senha2" class="form" type="password" placeholder="Insira a sua senha novamente" required><br>
                    </div>
                </div>

                <button type="submit" class="cadastrar">Cadastrar</button><br>
                    <p>Já possui uma conta?
                        <a href="login.php">Clique aqui para Logar.</a>
                    </p>
            </fieldset>
        </form>
        <?php include '../footer.php'; ?>
