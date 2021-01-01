<?php
session_start();
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
                    <th>Username</th>
                    <th>Pontuação</th>
                    <th>Nível máximo</th>
                </tr>
                <tr>
                    <td>RobertinhoZika</td>
                    <td>550</td>
                    <td>6</td>
                <tr>
                    <td>ElaSumiuDnv</td>
                    <td>500</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>InsoniaMaster</td>
                    <td>450</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>MiadorDeRole</td>
                    <td>400</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>MenosDe170cm</td>
                    <td>350</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>CaraDeAmizadesDuvidosas</td>
                    <td>300</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>OutroCaraComMenosDe170</td>
                    <td>250</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>PedeLogoDemissao</td>
                    <td>200</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>TravouDnv</td>
                    <td>150</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>DaRisadaDaMinhaCara</td>
                    <td>100</td>
                    <td>6</td>
                </tr>
            </table>
            <br>
            <b>Posição atual do usuário (nome do usuário aqui): (posição atual). </b> <br> <br>
        </div>
        <?php include '../footer.php'; ?>
