<?php
session_start();
include "bd.php";

if(empty($_POST['userLogin']) || empty($_POST['userPassword'])){
  header('Location: views/login.php');
  exit();
}

$userLogin = $_POST['userLogin'];
$userPassword =  $_POST['userPassword'];

$query = "select username from usuarios where username = '{$userLogin}' and senha = md5('{$userPassword}')";

$result = mysqli_query($con, $query);
$valores = $result->fetch_assoc();
$userLogin = $valores['username'];

$row = mysqli_num_rows($result);

if($row == 1){
  $_SESSION['userLogin'] = $userLogin;
  header('Location: views/main.php');
  exit();
}
else {
  header('Location: views/login.php');
  exit();
}









 ?>
