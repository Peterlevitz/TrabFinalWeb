<?php
session_start();
include "bd.php";

$username = $_SESSION['userLogin'];
$nome = $_POST['nome'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$senha2 = md5($_POST['senha2']);


/* Checando erros nos campos */

 if ((!$nome) || (!$tel) || (!$email) || (!$senha))
 {
     echo "ERRO: <br/><br/>";
     echo "Campos obrigatórios";

     include "views/main.php";
 }

  else
 {
    /*Vamos checar se o Email já existe no banco de dados */

    $sql_email_check = mysqli_query($con, "SELECT COUNT(id) FROM usuarios WHERE email='{$email}'");

    $eReg = mysqli_fetch_array($sql_email_check);
    
    $email_check = $eReg[0];
    
    if (($email_check > 0) || ($senha <> $senha2))
    {
        echo "<strong>ERRO</strong>: <br /><br />";

        if ($email_check > 0)
        {
            echo "Este email já está sendo utilizado.<br /><br />";

            unset($email);
        }

        if ($senha <> $senha2)
        {
            echo "As senhas digitadas são diferentes.<br /><br />";

            unset($senha);
        }?>
       <a href="views/editar.php">Clique aqui para voltar.</a>
       <?php
    }
     else{
        // Alterando os dados no banco

        $queryinsert = "UPDATE usuarios SET
            nome = '$nome', 
            tel = '$tel', 
            email = '$email', 
            senha = '$senha' WHERE username ='$username'";
            

        $sql = mysqli_query($con, $queryinsert)

        or die(mysqli_error('view/main.php'));

        if (!$sql)
        {
            echo "Ocorreu um erro ao editar sua conta, entre em contato.";
        }
        header("location: views/main.php");
      }
    }
?>
