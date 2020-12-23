<!--Guilherme Rodrigues  RA:198414-->


<!DOCTYPE html>
<html lang="pt">

<head>
    <title> Rolling Tetris</title>
    <meta charset="UTF-8" />
            <link rel="stylesheet" type="text/css" href="css/login.css" />
<link type="text/css" rel="stylesheet" href="css/geral.css">

</head>

<body>

    <header>
        <!---  <h1> Rolling Tetris</h1> -->

        <img src="img/logoR.png" width=20% height=30% alt="Rolling" class="rolling">
        <img src="img/logoT.png" width=20% height=30% alt="Tetris">


    </header>
    <section>
        <form action="?pagina=main" method="POST">

            <fieldset>
                <h2 class="login1">Login</h2>



                <div class="login">
                    <img src="img/user.jpg" width=15 height=15 alt="Usuario">
                    <label for="userLogin">Usuário</label>
                    <input class="form" id="userLogin" type="text" aria-label="Usuário" placeholder="Usuário">
                </div>
                <br>

                <div class="senha">
                    <img src="img/senha.png" width=15 height=15 alt="Senha">
                    <label for="userPassword">Senha </label>
                    <input class="form" id="userPassword" type="password" aria-label="Senha" placeholder="Senha">
                </div>


                <a href="?pagina=main" >
                    <input type="button" value="Entrar" class="enter">
                </a>


                <p class="cadastro">Não possui um usuário Rolling Tetris?
                    <a href="?pagina=cadastro">Cadastre-se</a>
                </p>
                <a href="#" class="recsenha">Esqueci minha senha</a>

            </fieldset>
        </form>


    </section>
        <?php include 'footer.php'; ?>
