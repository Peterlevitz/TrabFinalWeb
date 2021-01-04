<?php
session_start();
include "../bd.php";



$username = $_SESSION['userLogin'];
$busca = "select nome, tel, email from usuarios where username = '{$username}'";
$result = mysqli_query($con, $busca);
$valores = $result->fetch_assoc();
  $nome = $valores['nome'];
  $tel = $valores['tel'];
  $email = $valores['email'];
?>

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
        <form action="../confirmedit.php" method="post">
            <fieldset>
                <h1 class="cadname">Editar Cadastro</h1>
                <div class="row">
                    <div class="field">
                        <label for="nome"><b>Nome completo </b></label><br>
                        <input  name="nome" id="nome" class="form" type="text" value="<?php echo $nome; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="tel"><b>Telefone</b></label><br>
                        <input name="tel" id="tel" class="form" type="text" value="<?php echo $tel; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="email"><b>Email</b></label><br>
                        <input name="email" id="email" class="form" type="email" value="<?php echo $email; ?>"><br>
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

                <button type="submit" class="cadastrar">Editar</button><br>
                <a href="main.php"><button type="button" class="voltar">Voltar</button></a><br>
            </fieldset>
        </form>
    <?php include '../footer.php'; ?>
