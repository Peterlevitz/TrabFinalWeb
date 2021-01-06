<!DOCTYPE html>
<html lang="pt">

<head>
    <title> Rolling Tetris</title>
    <meta charset="UTF-8" />
            <link rel="stylesheet" type="text/css" href="../css/login.css" />
<link type="text/css" rel="stylesheet" href="css/geral.css">

</head>

<body>

    <header>
        <!---  <h1> Rolling Tetris</h1> -->

        <img src="../img/logoR.png" width=20% height=30% alt="Rolling" class="rolling">
        <img src="../img/logoT.png" width=20% height=30% alt="Tetris">


    </header>
    <section>
        <form action="../confirmlogin.php" method="POST">

            <fieldset>
                <h2 class="login1">Login</h2>



                <div class="login">
                    <img src="../img/user.jpg" width=15 height=15 alt="Usuario">
                    <label for="userLogin">Usuário</label>
                    <input class="form" id="userLogin" name="userLogin" type="text" aria-label="Usuário" placeholder="Usuário" required>
                </div>
                <br>

                <div class="senha">
                    <img src="../img/senha.png" width=15 height=15 alt="Senha">
                    <label for="userPassword">Senha </label>
                    <input class="form" id="userPassword" name="userPassword" type="password" aria-label="Senha" placeholder="Senha" required>
                </div>

                    <input type="submit" value="Entrar" class="enter">


                <p class="cadastro">Não possui um usuário Rolling Tetris?
                    <a href="cadastro.php">Cadastre-se</a>
                </p>
                

            </fieldset>
        </form>


    </section>
        <?php include '../footer.php'; ?>
