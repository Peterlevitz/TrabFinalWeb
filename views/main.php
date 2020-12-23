<?php include 'headerall.php'; ?>
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

                <table>
                    <tr>
                        <th><b>Nome</b></th>
                        <th><b>Pontuação Obtida</b></th>
                        <th><b>Nível Atingido</b></th>
                        <th><b>Duração da Partida</b></th>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Pontuação Obtida</td>
                        <td>Nível Atingido</td>
                        <td>Duração da Partida</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Pontuação Obtida</td>
                        <td>Nível Atingido</td>
                        <td>Duração da Partida</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Pontuação Obtida</td>
                        <td>Nível Atingido</td>
                        <td>Duração da Partida</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Pontuação Obtida</td>
                        <td>Nível Atingido</td>
                        <td>Duração da Partida</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Pontuação Obtida</td>
                        <td>Nível Atingido</td>
                        <td>Duração da Partida</td>
                    </tr>
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
    <?php include 'footer.php'; ?>
