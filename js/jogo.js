var lista_elementos = ['barra', 'quadrado', 'l-direita', 'l-esquerda', 't-invertido', 'u', 'especial'];
var elemento;
var sentido = 'baixo'
var linhas = 0;
var colunas = 0;
var tamanho_quadrado = 0;
var tabuleiro_sentido = "transform: rotate(0deg);";
var matriz_jogo = [];
var tempo_inicio = Date.now();
var speed = 1000;
var score = 0;
var tabuleiro = '1';
var op = 0;
var pausa = 0;
var LINHAS_MARGEM_SUPERIOR = 4;
var LINHAS_MARGEM_INFERIOR = 3;
var COLUNAS_MARGEM_DIREITA = 3;
var COLUNAS_MARGEM_ESQUERDA = 3;
var VAZIO = 0;
var OCUPADO = 1;
var ESPECIAL = 2;
var status = 'rodando';
var linhas_eliminadas = [];
var is_especial = false;
var pontuacao='';
var nivel = '';
var duracao = '';
var gameResult = new FormData();

function criaElemento(){//chamada para criar objetol-esquerda
    var componente = retornaComponente();
    var controlePosHorizontal = 0;
    pausa = 0;
    elemento = new Object();
    elemento.tipo = componente;//barra,quadrado,etc
    elemento.primeira_linha = retornaPrimeiraLinha(componente);
    elemento.primeira_coluna = retornaPrimeiraColuna(componente);
    elemento.matriz = retornaMatrizElemento(componente);

    elemento.html = criaComponente(componente);
    var jogo = document.getElementById("jogo");
    var elemento_atual = document.getElementById("elemento-atual");
    jogo.innerHTML = jogo.innerHTML + elemento.html;
    posicionar();
    autodrop();
}

function iniciar(){
  criaTabuleiro();
  criaElemento();
  tempo(1);
  nivel = '1';
  score = 0;
  pontuacao = score;
}
function retornaPrimeiraLinha(componente) {
    if ('barra' == componente){
        return 0;
    }
    else if ('quadrado' == componente){
        return 2;
    }
    else if ('l-direita' == componente){
        return 1;
    }
    else if ('l-esquerda' == componente){
        return 1;
    }
    else if ('t-invertido' == componente){
        return 2;
    }
    else if ('u' == componente){
        return 2;
    }
    else if ('especial' == componente){
        return 3;
    }
    return 0;
}

function validaMovimento_novo(){
    var matriz = elemento["matriz"];
    var lin_matriz = matriz.length;
    for(i = 0; i < lin_matriz; i++){
        var linha_matriz = matriz[i];
        var col_matriz = linha_matriz.length
        for (j =0; j < col_matriz; j++ ){
            var linha_jogo = i + elemento["primeira_linha"];
            var coluna_jogo = j + elemento["primeira_coluna"];
            var item_matriz_elemento = matriz[i][j];
            var item_matriz_jogo = matriz_jogo[linha_jogo][coluna_jogo];
            if (item_matriz_jogo != VAZIO && item_matriz_elemento != VAZIO){
                return false;
            }
        }
    }

    return true;
}

function retornaPrimeiraColuna(componente) {
    var primeira_coluna = COLUNAS_MARGEM_ESQUERDA;
    if ('barra' == componente){
        primeira_coluna += Math.floor((colunas-5)/2)
    }
    else if ('quadrado' == componente){
        primeira_coluna += Math.floor((colunas-2)/2)
    }
    else if ('l-direita' == componente){
        primeira_coluna += Math.floor((colunas-3)/2)
    }
    else if ('l-esquerda' == componente){
        primeira_coluna += Math.floor((colunas-3)/2)
    }
    else if ('t-invertido' == componente){
        primeira_coluna += Math.floor((colunas-3)/2)
    }
    else if ('u' == componente){
        primeira_coluna += Math.floor((colunas-3)/2)
    }
    else if ('especial' == componente){
        primeira_coluna += Math.floor((colunas-1)/2)
    }
    return primeira_coluna;
}

function retornaMatrizElemento(componente) {
    if ('barra' == componente){
        return [
            [VAZIO, VAZIO, OCUPADO, VAZIO, VAZIO],    
            [VAZIO, VAZIO, OCUPADO, VAZIO, VAZIO],    
            [VAZIO, VAZIO, OCUPADO, VAZIO, VAZIO],    
            [VAZIO, VAZIO, OCUPADO, VAZIO, VAZIO],    
        ];
    }
    else if ('quadrado' == componente){
        return [
            [OCUPADO, OCUPADO],
            [OCUPADO, OCUPADO],
        ];
    }
    else if ('l-direita' == componente){
        return [
            [VAZIO, OCUPADO, VAZIO],
            [VAZIO, OCUPADO, VAZIO],
            [VAZIO, OCUPADO, OCUPADO],
        ]
    }
    else if ('l-esquerda' == componente){
        return [
            [VAZIO, OCUPADO, VAZIO],
            [VAZIO, OCUPADO, VAZIO],
            [OCUPADO, OCUPADO, VAZIO],
        ]
    }
    else if ('t-invertido' == componente){
        return [
            [VAZIO, OCUPADO, VAZIO],
            [OCUPADO, OCUPADO, OCUPADO],
            [VAZIO, VAZIO, VAZIO],
        ]
    }
    else if ('u' == componente){
        return [
            [OCUPADO, VAZIO, OCUPADO],
            [OCUPADO, OCUPADO, OCUPADO],
            [VAZIO, VAZIO, VAZIO],
        ]
    }
    else if ('especial' == componente){
        return [[ESPECIAL]];
    }
    return 0;
}


function retornaComponente(){
    var max = lista_elementos.length;
    var indice = Math.floor(Math.random() * (0 - max) + max);
    return lista_elementos[indice];
}

function criaComponente(componente){
    obj = document.getElementById(componente).innerHTML;
    var html =
    "<div id='elemento-atual'>" + obj + "</div>"
    return html;
}


function autodrop(){
  const tempo_atual = Date.now();
  const dif = tempo_atual - tempo_inicio;

  switch(score){
      case 300:
          speed = 100;
          nivel = '2';
          break;
      case 600:
          speed = 600;
          nivel = '3';
          break;
      case 900:
          speed = 400;
          nivel = '4';
          break;
      case 1200:
          speed = 300;
          nivel = '5';
          break;
      case 1500:
          speed = 200;
          nivel = '6';
          break;
    }


  if(dif > speed) {
    mover_baixo();
    tempo_inicio = Date.now();
  }
  if (pausa != 1)
   requestAnimationFrame(autodrop);
}


function posicionar(){
    var left = (elemento["primeira_coluna"] - COLUNAS_MARGEM_ESQUERDA) * tamanho_quadrado;
    var top = - ( (linhas)  * tamanho_quadrado) + ((elemento.primeira_linha - LINHAS_MARGEM_SUPERIOR) * tamanho_quadrado) ;
    var elemento_atual = document.getElementById("elemento-atual");
    elemento_atual.style.top = top.toString() + 'px';
    elemento_atual.style.left = left.toString() + 'px';
}

function removeElemento(){
    document.getElementById("elemento-atual").remove();
}

function interromper(){
    // verificar o sentido antes de interromper
    if (elemento.primeira_linha < LINHAS_MARGEM_SUPERIOR){
        derrota();
        return
    }
    fixarPosicao();
    removeElemento();
    verifica_eliminar_linha();
    
    criaElemento();
}

function interromperjogo(){
    fixarPosicao();
    pausa = 1;
}

function fixarPosicao() {
    var linhasHTML = document.getElementById("jogo").getElementsByClassName("alinhamento-horizontal");
    var matriz = elemento["matriz"];
    var lin_matriz = matriz.length;
    for(i = 0; i < lin_matriz; i++){
        var linha_matriz = matriz[i];
        var col_matriz = linha_matriz.length
        for (j =0; j < col_matriz; j++ ){
            var linha_jogo = i + elemento["primeira_linha"];
            var coluna_jogo = j + elemento["primeira_coluna"];
            var item_matriz_elemento = matriz[i][j];
            var item_matriz_jogo = matriz_jogo[linha_jogo][coluna_jogo];
            var quadrados = linhasHTML[linha_jogo].getElementsByClassName('quadrado');
            if (item_matriz_jogo == OCUPADO || item_matriz_elemento == OCUPADO){
                quadrados[coluna_jogo].classList.add('quadrado-preenchido');
                matriz_jogo[linha_jogo][coluna_jogo] = OCUPADO
            }
            if (item_matriz_jogo == ESPECIAL || item_matriz_elemento == ESPECIAL){
              quadrados[coluna_jogo].classList.add('quadrado-especial');
              matriz_jogo[linha_jogo][coluna_jogo] = ESPECIAL
          }
        }
    }

}

function verifica_eliminar_linha(){
    var linhas_eliminadas = []
    var girar_cadidado = false;
    var girar_oficial = false;
    var linhas_matriz = matriz_jogo.length;
    for(i=1; i < linhas_matriz-LINHAS_MARGEM_INFERIOR; i++){
        var colunas = matriz_jogo[i].length;
        var remove_linha = true;
        for(j=colunas; j>0; j--){
            var celula = matriz_jogo[i][j];
            if (celula == VAZIO){
                remove_linha = false;
                break
            } else if (celula == ESPECIAL){
                girar_cadidado = true;
            }
        }
        if (remove_linha) {
            elimina_linha(i);
            if (girar_cadidado) {
                girar_oficial = true;
            }
        }

    }
    if (girar_oficial){
        girar_tabuleiro();
    }
}

function pontuar(paramLinhasElim){
    score = score + (10 * paramLinhasElim);
    document.getElementById('pontuacao').innerText = score; 

}


function elimina_linha(indice){
    var countLinhasElim = 0;
    var linhasHTML = document.getElementById("jogo").getElementsByClassName("alinhamento-horizontal");
    for (var i = indice; i >= 1; i--){
        linhasHTML[i].innerHTML = linhasHTML[i-1].innerHTML
        matriz_jogo[i] = matriz_jogo[i-1];
        countLinhasElim++;
    }
    pontuar(countLinhasElim);
    countLinhasElim = 0;
}
function girar_tabuleiro(){
    if (sentido == 'cima') {
        sentido = 'baixo';
        tabuleiro_sentido = "rotate(0deg)";
    } else {
        sentido = 'cima';
        tabuleiro_sentido =  "rotate(180deg)";
    }
    document.getElementById('jogo').style.transform = tabuleiro_sentido;

}

// criar eventos de chamada do teclado

document.addEventListener("keydown", detectaTecla);
function detectaTecla(e){
    if (`${e.code}` == "ArrowRight") {
        mover_direta();
    }
    if (`${e.code}` == "ArrowLeft") {
        mover_esquerda();
    }
    if (`${e.code}` == "ArrowDown") {
        mover_baixo();
    }
    if (`${e.code}` == "ArrowUp") {
        mover_cima();
    }
    if (`${e.code}` == "Space") {
        gira();
    }
}


function mover_direta(){
    elemento.primeira_coluna +=1;
    if (!validaMovimento_novo()){
        elemento.primeira_coluna -=1;
    }
    
    posicionar();
}

function mover_esquerda(){
    elemento.primeira_coluna -=1;
    if (!validaMovimento_novo()){
        elemento.primeira_coluna +=1;
    }
    
    posicionar();
}

function mover_baixo(){
    elemento.primeira_linha += 1;
    if (!validaMovimento_novo()){
        elemento.primeira_linha -= 1;
        interromper();
        return;
    }
    posicionar();
}

function mover_cima(){
    if (sentido == 'cima') {
        mover_baixo();
    }

}

function salvarJogo(){
    pontuacao = score;
    duracao = document.getElementById('duracaoPartida').innerText;

    
    gameResult.append('pontuacao', pontuacao);
    gameResult.append('nivel', nivel);
    gameResult.append('duracaoPartida', duracao);

    var sendResults = new XMLHttpRequest();
    url = '../partida.php'; 
    sendResults.open("POST", url, true);
    sendResults.onreadystatechange = function() {
        if (sendResults.readyState == 4) {
            if (sendResults.status = 200)
                console.log(sendResults.responseText);
                dinaUptade();
            }
        }
        sendResults.send(gameResult);
}

function dinaUptade(){
    var sendResults = new XMLHttpRequest();
    url = '../rankingUser.php'; 
    sendResults.open("GET", url, true);
    sendResults.onreadystatechange = function() {
        if (sendResults.readyState == 4) {
            if (sendResults.status = 200)
                document.getElementById('rankingUser').innerHTML = sendResults.responseText;
            }
        }
        sendResults.send();
}

function derrota(){
    salvarJogo();
    iniciar();
}

function gira(){
    var elemento_html = document.getElementById('elemento-atual');
    var linhas = elemento_html.getElementsByClassName('alinhamento-horizontal');
    var matriz_componente = [];
    for (i=0; i < linhas.length; i++){
        quadradosLinha = linhas[i].getElementsByClassName('quadrado');
        matriz_componente.push(quadradosLinha);
    }
    var linhas_matriz = matriz_componente.length;
    var colunas_matriz = matriz_componente[0].length;

    var matriz_nova = [];
    var matriz_elemento_nova = [];
    for (j=colunas_matriz - 1; j >= 0 ; j--){
        item = [];
        item_elemento = [];
        for(i=0; i < linhas_matriz; i++){
            item_elemento.push(elemento.matriz[i][j]);
            item.push(matriz_componente[i][j].outerHTML);
        }
        matriz_nova.push(item);
        matriz_elemento_nova.push(item_elemento);
    }
    elemento.matriz = matriz_elemento_nova;
    var coluna_ = colunas_matriz;
    var colunas_matriz = linhas_matriz;
    var linhas_matriz = coluna_;
    if(!validaMovimento_novo()){
       
        matriz_elemento_nova = [];

        for(j=0; j < colunas_matriz; j++){
            item_elemento =[];
            for (i=(linhas_matriz - 1); i >= 0 ; i--){
                item_elemento.push(elemento.matriz[i][j]);
            }
            matriz_elemento_nova.push(item_elemento);
        }
        elemento.matriz = matriz_elemento_nova;
        return;
    }
    var html = ""

    var linhas_matriz = matriz_nova.length;
    var colunas_matriz = matriz_nova[0].length;

    for (i=0; i < linhas_matriz; i++){
        html += "<div class=\"alinhamento-horizontal \">";
        for(j=0; j < colunas_matriz; j++){
            html += matriz_nova[i][j];
        }
        html += "</div>";
    }

    elemento_html.innerHTML = html;

}

function show_tab(tipo) {
    tabuleiro = tipo;
    criaTabuleiro();
    }

function criaTabuleiro() {
  if (tabuleiro == '1') {
        linhas = 20;
        colunas = 10;
        tamanho_quadrado = 18;
        // html = document.getElementById("matriz_1").innerHTML;
        pixels = '16';
    } else if (tabuleiro == '2') {
        linhas = 44;
        colunas = 22;
        tamanho_quadrado = 10;
        // html = document.getElementById("matriz_2").innerHTML;
        pixels = '8';
    }
    document.getElementById("show").innerHTML = "<div id='jogo'> </div>";
    jogo = document.getElementById("jogo");
    popula_matriz_jogo(linhas,colunas);
    // jogo.innerHTML = html;
    var cols = document.getElementsByClassName('quadrado');
    for(i = 0; i < cols.length; i++) {
        cols[i].style.height = pixels + 'px';
        cols[i].style.width = pixels + 'px';
    }
    jogo.style.width = (tamanho_quadrado * colunas).toString() + 'px';
    jogo.style.height = (tamanho_quadrado * linhas).toString() + 'px';
}

function popula_matriz_jogo(linhas,colunas){
    var linhas_matriz = linhas + LINHAS_MARGEM_SUPERIOR + LINHAS_MARGEM_INFERIOR;
    var colunas_matriz = colunas + COLUNAS_MARGEM_DIREITA + COLUNAS_MARGEM_ESQUERDA;
    var html = "";
    matriz_jogo=[]
    for (i=0; i < linhas_matriz;i++){
        var linha_matriz = [];
        if (i < LINHAS_MARGEM_SUPERIOR || i >= (linhas_matriz - LINHAS_MARGEM_INFERIOR) ) {
            html += '<div class="alinhamento-horizontal escondido">'
        } else {
            html += '<div class="alinhamento-horizontal">'
        }
        for (j=0; j < colunas_matriz; j++){
            if (j < COLUNAS_MARGEM_ESQUERDA || j >= (colunas_matriz - COLUNAS_MARGEM_DIREITA)
            ||  i >= (linhas_matriz - LINHAS_MARGEM_INFERIOR)){
                html += '<div class="quadrado escondido"></div>'
                linha_matriz.push(OCUPADO);
            }
            else  {
                html += '<div class="quadrado"></div>'
                linha_matriz.push(VAZIO);
            }
        }
        html += '</div>';
        matriz_jogo.push(linha_matriz);
    }

    jogo = document.getElementById("jogo");
    jogo.innerHTML = html;
}



var intervalo;

function tempo(op) {

	var s = 1;
	var m = 0;
	var h = 0;

  if (op == 1){
    window.clearInterval(intervalo);
	intervalo = window.setInterval(function() {
		if (s == 60) { m++; s = 0; }
		if (m == 60) { h++; s = 0; m = 0; }
		if (h < 10) document.getElementById("hora").innerHTML = "0" + h + ":"; else document.getElementById("hora").innerHTML = h + "h ";
		if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + ":"; else document.getElementById("segundo").innerHTML = s + "s ";
		if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + ":"; else document.getElementById("minuto").innerHTML = m + "m ";
		s++;
	},1000);
}
}

function parar() {
    window.clearInterval(intervalo);
    interromperjogo();

}

window.onload=tempo;

//	document.getElementById('parar').style.display = "none";
//	document.getElementById('comeca').style.display = "block";
