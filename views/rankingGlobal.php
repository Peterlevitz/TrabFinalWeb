<?php
include '../headerall.php';
include '../verify_login.php';
 ?>
        <div>
            <header>
                <img src="../img/logoR.png"  alt="Rolling" class="rolling imageRanking">
                <img src="../img/logoT.png"  alt="Tetris" class="imageRanking">
                <h1>Ranking Global dos Jogadores</h1>
            </header>
                        <?php
                          include("../bd.php");
                        $sql = "SELECT usuarios.username, ranking.pontuacao, ranking.nivel, ranking.duracaoPartida FROM usuarios,ranking where usuarios.id = ranking.idusuario  ORDER BY ranking.pontuacao desc";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0){
                            echo "<table class='tabelaGlobal'><tr><th><b>Nome</b></th><th><b>Pontuação Obtida</b></th><th><b>Nível Atingido</b></th><th><b>Duração da Partida</b></th> </tr><tr>";          
                        
                        $cont = 1;
                        $posicao = 0;
                        while ($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["username"]."</td><td>".$row["pontuacao"]."</td><td>".$row["nivel"]."</td><td>".$row["duracaoPartida"]."</td></tr>";
                        
                        if($posicao == 0 and strtolower($row["username"]) == strtolower($_SESSION['userLogin'])){

                           $posicao = $cont; 
                           
                        }
                        
                        $cont++;
                        
                        }
                        echo "</table>";
                    }
                        else{
                            echo "Não contem pontuação do Tetris";
                        }
                    ?>
            <br>
            <b>Posição atual de <?php echo $_SESSION['userLogin']?>: <?php echo $posicao ?></b> <br> <br>
        </div>
        <?php include '../footer.php'; ?>
