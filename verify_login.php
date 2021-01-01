<?php
if(!$_SESSION['userLogin']){
  header('Location: login.php');
  exit();
}
 ?>
