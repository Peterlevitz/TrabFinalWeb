<?php
#Incluindo base de dados
include 'bd.php';

if(isset($_GET['pagina']))
{
$pagina = $_GET['pagina'];
}
else
{
$pagina = 'login';
#Incluindo cabeçalho
}

switch($pagina)
{
    case 'main': include 'views/main.php'; break;
    case 'rankingGlobal': include 'views/rankingGlobal.php'; break;
    case 'cadastro': include 'views/cadastro.php'; break;
    case 'login': include 'views/login.php'; break;
    default: include 'views/login.php'; break;
}
