<?php
    if (session_status() != PHP_SESSION_ACTIVE){
        session_start();
    } 
    include 'bd.php';
    $currentUser = $_SESSION['userLogin'];
    $sql = "SELECT u.username, r.pontuacao, r.nivel, r.duracaoPartida FROM ranking r INNER JOIN usuarios u ON u.id = r.idusuario where u.username = '{$currentUser}' ORDER by r.pontuacao DESC LIMIT 5 ";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        echo "<table><tr><th><b>Nome</b></th><th><b>Pontuação Obtida</b></th><th><b>Nível Atingido</b></th><th><b>Duração da Partida</b></th> </tr><tr>";          
    while ($row = $result->fetch_assoc()){
    echo "<tr><td>".$row["username"]."</td><td>".$row["pontuacao"]."</td><td>".$row["nivel"]."</td><td>".$row["duracaoPartida"]."</td></tr>";
    }
    echo "</table>";
}
    else{
        echo "Não contem pontuação do Tetris";
    }
?>