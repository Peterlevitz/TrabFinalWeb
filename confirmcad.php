<?php

include "bd.php";
date_default_timezone_set("America/Sao_Paulo");

$nome = $_POST['nome'];
$data = $_POST['data'];
$cpf = $_POST['cpf'];
$tel = $_POST['tel'];
$username = $_POST['user'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$senha2 = md5($_POST['senha2']);


/* Checando erros nos campos */

 if ((!$nome) || (!$data) || (!$cpf) || (!$tel) || (!$username) || (!$email) || (!$senha))
 {
     echo "ERRO: <br/><br/>";
     echo "Campos obrigatórios";

     include "login.php";
 }

  else
 {
    /*Vamos checar se o nome de Usuário escolhido e/ou Email já existem no banco de dados */

    $sql_email_check = mysqli_query($con, "SELECT COUNT(id) FROM usuarios WHERE email='{$email}'");

    $sql_usuario_check = mysqli_query($con, "SELECT COUNT(id) FROM usuarios WHERE username='{$username}'");

    $eReg = mysqli_fetch_array($sql_email_check);
    $uReg = mysqli_fetch_array($sql_usuario_check);

    $email_check = $eReg[0];
    $usuario_check = $uReg[0];

     if (($email_check > 0) || ($usuario_check > 0) || ($senha <> $senha2))
     {
         echo "<strong>ERRO</strong>: <br /><br />";

         if ($email_check > 0)
         {
             echo "Este email já está sendo utilizado.<br /><br />";

             unset($email);
         }

         if ($usuario_check > 0)
         {
             echo "Este nome de usuário já está sendo utilizado.<br /><br />";

             unset($username);
         }
         if ($senha <> $senha2)
         {
            echo "As senhas digitadas são diferentes.<br /><br />";

            unset($senha);
         } ?>
        <a href="views/cadastro.php">Clique aqui para voltar.</a>
        <?php
     }
     else{
        // Inserindo os dados no banco de dados

        $queryinsert = "INSERT INTO usuarios
          (nome, data, cpf, tel, username, email, senha )
        VALUES
        ('$nome', '$data', '$cpf', '$tel', '$username', '$email', '$senha')";

        $sql = mysqli_query($con, $queryinsert)

        or die(mysqli_error());

        if (!$sql)
        {
            echo "Ocorreu um erro ao criar sua conta, entre em contato.";
        }
        header("location: views/cadastro.php");
      }
    }
?>
