<?php
session_start();
include "bd.php";

$username = $_SESSION['userLogin'];
$nome = $_POST['nome'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$senha2 = md5($_POST['senha2']);

//buscando o email do usuario logado
$busca = "select email from usuarios where username = '{$username}'";
$result = mysqli_query($con, $busca);
$valores = $result->fetch_assoc();
  $emaillogado = $valores['email'];


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

//adicionando exceção para caso o email seja o mesmo do usuario logado (em caso de nao alteração)
    if($email == $emaillogado )
        $eReg[0] = 0;

    if (($eReg[0] > 0) || ($senha <> $senha2))
    {
        echo "<strong>ERRO</strong>: <br /><br />";

        if ($senha <> $senha2)
        {
            echo "As senhas digitadas são diferentes.<br /><br />";

            unset($senha);
        }

        if ($eReg[0] > 0)
        {
            echo "Este email já está sendo utilizado.<br /><br />";

            unset($email);
        }
?>
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

        $sql = mysqli_query($con, $queryinsert);

        if (!$sql)
        {
            echo "Ocorreu um erro ao editar sua conta, entre em contato.";
            ?>
             <a href="views/editar.php">Clique aqui para voltar.</a>
             <?php
        }
        header("location: views/main.php");
      }
    }
?>
