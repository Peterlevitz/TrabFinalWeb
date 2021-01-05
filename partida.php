<?php

include "bd.php";
session_start();
date_default_timezone_set("America/Sao_Paulo");

$currentUser = $_SESSION['userLogin'];

$query = "SELECT id FROM usuarios where username = '{$currentUser}' LIMIT 1 ";

$result = mysqli_query($con, $query);
$valores = $result->fetch_assoc();

$pontuacao = $_POST['pontuacao'];
$nivel = $_POST['nivel'];
$duracaoPartida = $_POST['duracaoPartida'];
$idUsuario = $valores['id'];

$queryinsert = "INSERT INTO ranking
(pontuacao, nivel, duracaoPartida, idUsuario)
VALUES
('$pontuacao', '$nivel', '$duracaoPartida', '$idUsuario')";

$sql = mysqli_query($con, $queryinsert);

echo "comi o cu de quem ta lendo";