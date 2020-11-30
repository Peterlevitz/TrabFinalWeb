var lista_elementos = ['barra', 'quadrado', 'l-direita', 'l-esquerda', 't-invertido', 'u', 'especial'];
var elemento;
var sentido = 'baixo'
var linhas = 0;
var colunas = 0;
var tamanho_quadrado = 0;
var tabuleiro_sentido = "transform: rotate(0deg);";
var matriz_jogo = [];


function criaElemento(){//chamada para criar objetol-esquerda
    var componente = retornaComponente();
    var controlePosHorizontal = 0;
    elemento = new Object();
    elemento.tipo = componente;//barra,quadrado,etc
    elemento.top = retornaTop(componente);//posiçao vertical do elemento
    elemento.colunas = retornaColunas(componente); // colunas q esse elemento esta ocupando
    elemento.celulas = retornaCelulas();
    elemento.celulas_candidatas = retornaCelulasCandidatas();

    elemento.html = criaComponente(componente);
    var jogo = document.getElementById("jogo");
    var elemento_atual = document.getElementById("elemento-atual");
    jogo.innerHTML = jogo.innerHTML + elemento.html;
    posicionar();
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
    // 'barra', 'quadrado', 'l-direita', 'l-esquerda', 't-invertido', 'u', 'especial'
    return 'u';
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

function mover_celulas_baixo(){
    //reduzir todas as linhas das celulas candidadas
    elemento.celulas_candidatas = elemento.celulas;
    var tam_cel = elemento.celulas_candidatas.length;
    for(i =0; i < tam_cel; i++){
        elemento.celulas_candidatas[i].linha += 1;
    }
}

function posicionar(){
    var primeira_col = elemento["colunas"][0];
    var left = primeira_col * tamanho_quadrado;
    var elemento_atual = document.getElementById("elemento-atual");
    elemento_atual.style.top = elemento["top"].toString() + 'px';
    elemento_atual.style.left = left.toString() + 'px';
}

function removeElemento(){
    document.getElementById("elemento-atual").remove();
}

function interromper(){
    // verificar o sentido antes de interromper

    verifica_eliminar_linha();
    fixarPosicão();
    removeElemento();
    criaElemento();
}

function fixarPosicao() {

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
    for (i=0; i < tamanho_col - 1; i++){
        elemento.colunas[i] +=1;
    }
    // elemento.posHor += 1;
    posicionar();
}

function mover_esquerda(){
    var tamanho_col = elemento.colunas.length;
    for (i=0; i < tamanho_col - 1; i++){
        elemento.colunas[i] -= 1;
    }
    elemento.posHor -= 1;
    posicionar();
}

function mover_baixo(){
    mover_celulas_baixo();
    if (!validaMovimento){
        interromper();
        return;
    }
    elemento.celulas = elemento.celulas_candidatas;
    elemento.top += tamanho_quadrado;
    posicionar();
    elemento.celulas_candidatas = retornaCelulasCandidatas();
}

function mover_cima(){
    elemento.top -= tamanho_quadrado;
    posicionar();
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
    for (i=colunas_matriz - 1; i >= 0 ; i--){
        item = [];
        for(j=0; j < linhas_matriz; j++){
            item.push(matriz_componente[j][i].outerHTML);
        }
        matriz_nova.push(item);
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
    if (tipo == '1') {
        linhas = 20;
        colunas = 10;
        tamanho_quadrado = 18;
        html = document.getElementById("matriz_1").innerHTML;
        pixels = '16';
    } else if (tipo == '2') {
        linhas = 44;
        colunas = 22;
        tamanho_quadrado = 10;
        html = document.getElementById("matriz_2").innerHTML;
        pixels = '8';
    }
    popula_matriz_jogo(linhas,colunas);
    document.getElementById("show").innerHTML = "<div id='jogo'> </div>";
    jogo = document.getElementById("jogo");
    jogo.innerHTML = html;
    var cols = document.getElementsByClassName('quadrado');
    for(i = 0; i < cols.length; i++) {
        cols[i].style.height = pixels + 'px';
        cols[i].style.width = pixels + 'px';
    }
    jogo.style.width = (tamanho_quadrado * colunas).toString() + 'px';
    jogo.style.height = (tamanho_quadrado * linhas).toString() + 'px';
}

function popula_matriz_jogo(linhas,colunas){
    for (i=0; i<linhas+5;i++){
        var linha_matriz = [];
        for (j=0; j<colunas+4; j++){
            linha_matriz.push(false);
        }
        matriz_jogo.push(linha_matriz);
    }
}
