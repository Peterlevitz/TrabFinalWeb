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
var LINHAS_MARGEM_SUPERIOR = 4;
var LINHAS_MARGEM_INFERIOR = 1;
var COLUNAS_MARGEM_DIREITA = 3;
var COLUNAS_MARGEM_ESQUERDA = 3;
var VAZIO = 0;
var OCUPADO = 1;
var ESPECIAL = 2;
var status = 'rodando';

function criaElemento(){//chamada para criar objetol-esquerda
    var componente = retornaComponente();
    var controlePosHorizontal = 0;
    elemento = new Object();
    elemento.tipo = componente;//barra,quadrado,etc
    elemento.top = retornaTop(componente);//posiçao vertical do elemento
    elemento.primeira_linha = retornaPrimeiraLinha(componente);
    elemento.primeira_coluna = retornaPrimeiraColuna(componente);
    elemento.matriz = retornaMatrizElemento(componente);
    elemento.colunas = retornaColunas(componente); // colunas q esse elemento esta ocupando
    elemento.celulas = retornaCelulas();
    elemento.celulas_candidatas = retornaCelulasCandidatas();

    elemento.html = criaComponente(componente);
    var jogo = document.getElementById("jogo");
    var elemento_atual = document.getElementById("elemento-atual");
    jogo.innerHTML = jogo.innerHTML + elemento.html;
    posicionar();
    autodrop();
}

function iniciar(){
    status = 'rodando';
    if (document.getElementById)
    removeElemento();
    criaTabuleiro();
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
            [VAZIO, VAZIO, OCUPADO, VAZIO],
            [VAZIO, VAZIO, OCUPADO, VAZIO],
            [VAZIO, VAZIO, OCUPADO, VAZIO],
            [VAZIO, VAZIO, OCUPADO, VAZIO],
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
        return 2;
    }
    else if ('especial' == componente){
        return [[ESPECIAL]];
    }
    return 0;
}

function validaMovimento(){
    var num_cel = elemento.celulas_candidatas.length;
    for (i=0; i<num_cel; i++){
        var cel = elemento.celulas_candidatas[i];
        var linha = cel.linha;
        var coluna = cel.coluna;
        if (linha >= 0 && coluna >= 0 && matriz_jogo[linha][coluna]){
            return false;
        }
    }

    return true;
}

function retornaCelulasCandidatas(componente){

    cel1 = new Object();
    cel1.linha = elemento.celulas[0].linha+1;
    cel1.coluna = elemento.celulas[0].coluna+1;

    cel2 = new Object();
    cel2.linha = elemento.celulas[1].linha+1;
    cel2.coluna =  elemento.celulas[1].coluna+1;

    cel3 = new Object();
    cel3.linha = elemento.celulas[2].linha+1;
    cel3.coluna =  elemento.celulas[2].coluna+1;

    cel4 = new Object();
    cel4.linha = elemento.celulas[3].linha+1;
    cel4.coluna =  elemento.celulas[3].coluna+1;
    return [cel1,cel2,cel3,cel4];
}


function retornaCelulas(componente){
    celula1 = new Object();
    celula1.linha = -4
    celula1.coluna = 5;

    celula2 = new Object();
    celula2.linha = -3
    celula2.coluna = 5;

    celula3 = new Object();
    celula3.linha = -2
    celula3.coluna = 5;

    celula4 = new Object();
    celula4.linha = -1
    celula4.coluna = 5;
    return [celula1,celula2,celula3,celula4];
    if ('barra' == componente){

    }
    else if ('quadrado' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('l-direita' == componente){
        return 3*tamanho_quadrado;
    }
    else if ('l-esquerda' == componente){
        return 3*tamanho_quadrado;
    }
    else if ('t-invertido' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('u' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('especial' == componente){
        return tamanho_quadrado;
    }
    return [];
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

function retornaTop(componente) {
    var topo = -linhas*tamanho_quadrado;
    topo -= retornaAlturaComponente(componente);
    return topo;
}

function retornaAlturaComponente(componente) {
    if ('barra' == componente){
        return 4*tamanho_quadrado;
    }
    else if ('quadrado' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('l-direita' == componente){
        return 3*tamanho_quadrado;
    }
    else if ('l-esquerda' == componente){
        return 3*tamanho_quadrado;
    }
    else if ('t-invertido' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('u' == componente){
        return 2*tamanho_quadrado;
    }
    else if ('especial' == componente){
        return tamanho_quadrado;
    }
    return 0;
}

function retornaColunas(componente) {
    coluna_comp = colunas-1;
    if ('barra' == componente){
        primeira_col = Math.floor((coluna_comp)/2);
        return [primeira_col];
    }
    else if ('quadrado' == componente){
        primeira_col = Math.floor((coluna_comp-1)/2);
        return [primeira_col, primeira_col+1];
    }
    else if ('l-direita' == componente){
        primeira_col = Math.floor((coluna_comp)/2);
        return [primeira_col, primeira_col+1];
    }
    else if ('l-esquerda' == componente){
        primeira_col = Math.floor((coluna_comp-1)/2);
        return [primeira_col, primeira_col+1];
    }
    else if ('t-invertido' == componente){
        primeira_col = Math.floor((coluna_comp - 2)/2);
        return [primeira_col, primeira_col+1, primeira_col+3];
    }
    else if ('u' == componente){
        primeira_col = Math.floor((coluna_comp - 2)/2);
        return [primeira_col, primeira_col+1, primeira_col+3];
    }
    else if ('especial' == componente){
        primeira_col = Math.floor((coluna_comp)/2);
        return [primeira_col];
    }
    return [0];
}

function autodrop(){
  const tempo_atual = Date.now();
  const dif = tempo_atual - tempo_inicio;

  if(dif > speed) {
    mover_baixo();
    tempo_inicio = Date.now();
  }
   requestAnimationFrame(autodrop);
}

function mover_celulas_baixo(){
    //reduzir todas as linhas das celulas candidadas
    elemento.celulas_candidatas = elemento.celulas;
    var tam_cel = elemento.celulas_candidatas.length;
    for(i =0; i < tam_cel; i++){
        elemento.celulas_candidatas[i].linha += 1;
    }
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

    verifica_eliminar_linha();
    fixarPosicao();
    removeElemento();
    criaElemento();
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
    //percorrer as linha
    elimina_linha();

}

function elimina_linha(){
    // if ( tem especial){

    // }


}

function girar_tabuleiro(){
    if (sentido == 'cima') {
        sentido = 'baixo';
        tabuleiro_sentido = "transform: rotate(0deg);";


    } else {
        sentido = 'cima';
        tabuleiro_sentido =  "transform: rotate(180deg);";
    }


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

var posHor = 0;

function mover_direta(){
    var tamanho_col = elemento.colunas.length;
    elemento.primeira_coluna +=1;
    if (!validaMovimento_novo()){
        elemento.primeira_coluna -=1;
    }
    for (i=0; i < tamanho_col - 1; i++){
        elemento.colunas[i] +=1;
    }
    // elemento.posHor += 1;
    posicionar();
}

function mover_esquerda(){
    var tamanho_col = elemento.colunas.length;
    elemento.primeira_coluna -=1;
    if (!validaMovimento_novo()){
        elemento.primeira_coluna +=1;
    }
    for (i=0; i < tamanho_col - 1; i++){
        elemento.colunas[i] -= 1;
    }
    elemento.posHor -= 1;
    posicionar();
}

function mover_baixo(){
    mover_celulas_baixo();
    elemento.primeira_linha += 1;
    if (!validaMovimento_novo()){
        elemento.primeira_linha -= 1;
        interromper();
        return;
    }
    elemento.celulas = elemento.celulas_candidatas;
    elemento.top += tamanho_quadrado;
    posicionar();
    elemento.celulas_candidatas = retornaCelulasCandidatas();
}

function mover_cima(){
    if (sentido == 'cima') {
        mover_baixo();
    }

}

function gira(){
    var elemento = document.getElementById('elemento-atual');
    var linhas = elemento.getElementsByClassName('alinhamento-horizontal');
    var matriz_componente = [];
    for (i=0; i < linhas.length; i++){
        quadradosLinha = linhas[i].getElementsByClassName('quadrado');
        matriz_componente.push(quadradosLinha);
    }
    var linhas_matriz = matriz_componente.length;
    var colunas_matriz = matriz_componente[0].length;

    var matriz_nova = [];
    var matriz_elemento_nova = [];
    for (i=colunas_matriz - 1; i >= 0 ; i--){
        item = [];
        item_elemento = [];
        for(j=0; j < linhas_matriz; j++){
            if (item_elemento.hasOwnProperty(j))
            item_elemento.push(elemento.matriz[j][i]);
            item.push(matriz_componente[j][i].outerHTML);
        }
        matriz_nova.push(item);
        matriz_elemento_nova.push(item_elemento)
    }
    elemento.matriz = matriz_elemento_nova
    if(!validaMovimento_novo()){
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

    elemento.innerHTML = html;

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
        html += '<div class="alinhamento-horizontal">'
        for (j=0; j < colunas_matriz; j++){
            if (i < LINHAS_MARGEM_SUPERIOR || i >= (linhas_matriz - LINHAS_MARGEM_INFERIOR) ) {
                html += '<div class="quadrado escondido"></div>'
                if ( i >= (linhas_matriz - LINHAS_MARGEM_INFERIOR)){
                    linha_matriz.push(OCUPADO);
                } else {
                    linha_matriz.push(VAZIO);
                }
            }
            else if (j < COLUNAS_MARGEM_ESQUERDA || j >= (colunas_matriz - COLUNAS_MARGEM_DIREITA)){
                html += '<div class="quadrado escondido"></div>'
                linha_matriz.push(OCUPADO);
            } else {
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
	intervalo = window.setInterval(function() {
		if (s == 60) { m++; s = 0; }
		if (m == 60) { h++; s = 0; m = 0; }
		if (h < 10) document.getElementById("hora").innerHTML = "0" + h + "h "; else document.getElementById("hora").innerHTML = h + "h ";
		if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + "s "; else document.getElementById("segundo").innerHTML = s + "s ";
		if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + "m "; else document.getElementById("minuto").innerHTML = m + "m ";
		s++;
	},1000);
}
}

function parar() {
	window.clearInterval(intervalo);
}

window.onload=tempo;

//	document.getElementById('parar').style.display = "none";
//	document.getElementById('comeca').style.display = "block";
