<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "tetrisbd";

$con = mysqli_connect($host, $user, $password, $database);
// mysqli_set_charset($con,"utf8");

if($con->connect_errno)
  echo "Falha na conexão: (".$con->connect_errno.") ".$con->connect_error;
