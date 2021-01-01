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


 <table class="tabelaGlobal">
                    <tr>
                        <td width="89">Posição</td>
                        <td width="142">Nome</td>
                        <td width="114">Pontuação</td>
                        <td width="228">Nível Máximo</td>

                    </tr>

                    <?php $posicao = 1; //variavel

                // Inclui o arquivo que faz a conexão ao banco de dados
                include("../bd.php");

                //consulta sql
                $query = mysql_query("SELECT U.usuario, R.pontuacao, R.nivel FROM ranking R
                                        left join usuario U on U.id = R.idusuario


                                         ORDER BY R.pontuacao") or die(mysql_error());

                //faz um looping e cria um array com os campos da consulta
                while($array = mysql_fetch_array($query)) {

                $usuario=$array['usuario'];$pontuacao=$array['pontuacao'];$nivel=$array['nivel'];
              }
                ?>

                    <tr>
                        <td><?php echo $posicao; ?></td>
                        <td><?php echo $usuario; ?></td>
                        <td><?php echo $pontuacao; ?></td>
                        <td><?php echo $nivel; ?></td>

                    </tr>

                    <?php
                $posicao = $posicao + 1; // acumula proxima posicao ate terminar} ?>

</table>
            <br>
            <b>Posição atual do usuário (nome do usuário aqui): (posição atual). </b> <br> <br>
        </div>
        <?php include '../footer.php'; ?>
