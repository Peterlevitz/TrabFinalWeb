<?php

include '../headerall.php';
include '../verify_login.php';

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
                    <td><span id="hora">00 h</span><span id="minuto">00 m</span><span id="segundo">00 s</span><br></td>
                </tr>
                <tr>
                    <td>Pontuação</td>
                    <td>0</td>
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


                <div class="item-info posicao">1</div>
            <div class="item-info">




   <table width="380">
        <tr>
            <td width="89">Posição</td>
            <td width="142">Nome</td>
            <td width="114">Pontuação Obtida</td>
            <td width="228">Nível Atingido	</td>
            <td width="228">Duração da Partida	</td>
        </tr>

        <?php $posicao = 1; //variavel

    // Inclui o arquivo que faz a conexão ao banco de dados
    include("../bd.php");

    //consulta sql
    $query = mysql_query("SELECT U.usuario, R.pontuacao, R.nivel, R.duracaoPartida FROM ranking R
                            left join usuario U on U.id = R.idusuario
                            where U.usuario =  <usuario>                                             /* Alterar usuario da sessão */

                             ORDER BY R.pontuacao
                            Desc Limit 5") or die(mysql_error());

    //faz um looping e cria um array com os campos da consulta
    while($array = mysql_fetch_array($query)) {

    $usuario=$array['usuario'];$pontuacao=$array['pontuacao'];$nivel=$array['nivel']; $duracaoPartida=$array['duracaoPartida'];
  }
    ?>

        <tr>
            <td><?php echo $posicao; ?></td>
            <td><?php echo $usuario; ?></td>
            <td><?php echo $pontuacao; ?></td>
            <td><?php echo $nivel; ?></td>
            <td><?php echo $duracaoPartida; ?></td>
        </tr>

        <?php
    $posicao = $posicao + 1; // acumula proxima posicao ate terminar} ?>

    </table>
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
