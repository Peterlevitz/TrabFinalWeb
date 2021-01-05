<?php

include '../headerall.php';
include '../verify_login.php';
include '../bd.php';
?>
    <section class="conteudo">

        <div class="tela-principal">



            <div class="ext-jogo">
                <div class='config'>
                    <div>Tamanho Tabuleiro:</div>
                    <div class="alinhamento-horizontal">
                        <p> <input type="button" name="exibir" value="10 x 20" onclick='show_tab("1")'
                                class="botao-tam" /> </p>
                        <p> <input type="button" name="exibir" value="22 x 44" onclick='show_tab("2")'
                                class="botao-tam" /> </p>
                    </div>
                </div>
                <div id="show">

                </div>


            </div>


        </div>

        <div class="info">
          <h2>Detalhes da Partida</h2>
            <table class='item-info tabela-info'>
                <tr>
                    <td>Tempo partida</td>
                    <td id='duracaoPartida'><span id="hora">00:</span><span id="minuto">00:</span><span id="segundo">00</span><br></td>
                </tr>
                <tr>
                    <td>Pontuação</td>
                    <td id = 'pontuacao'>0</td>
                </tr>
                <tr>
                    <td>Nivel</td>
                    <td id = 'nivel'>0</td>
                </tr>
                <tr>
                    <td>Linhas Eliminadas</td>
                    <td>0</td>
                </tr>
            </table>
            <div class="item-info menu-botao">
                <div id="parar"><input type="button" class="botao botao-pausar" value="Parar" onclick="parar();">
                </div>
                <div id="comeca"><input type="button" class="botao botao-iniciar" value="Começar" onclick="iniciar()"><br>
                </div>
                </div>


                <div class="item-info">
                        <?php
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
                </div>

        <div id='barra' class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
        </div>

        <div id='quadrado' class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
        </div>

        <div id='l-direita' class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
        </div>

        <div id='l-esquerda' class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
        </div>

        <div id='t-invertido' class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
        </div>

        <div id='u' class="escondido">
            <div class="alinhamento-horizontal ">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
            <div class="alinhamento-horizontal ">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado quadrado-preenchido"></div>
            </div>
            <div class="alinhamento-horizontal ">
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
                <div class="quadrado invisivel"></div>
            </div>
        </div>

        <div id=especial class="escondido">
            <div class="quadrado quadrado-preenchido quadrado-especial"></div>
        </div>

        <div id="matriz_1" class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
            </div>

            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>

            </div>
        </div>
        <div id="matriz_2" class="escondido">
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
            </div>



            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>

            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
            </div>

            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>
            </div>
            <div class="alinhamento-horizontal">
                <div class="quadrado quadrado-preenchido"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado"></div>
                <div class="quadrado "></div>
                <div class="quadrado "></div>

            </div>
        </div>
    </section>
    <?php include '../footer.php'; ?>
