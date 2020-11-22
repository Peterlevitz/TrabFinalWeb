var lista_elementos = ['barra', 'quadrado', 'l-direita', 'l-esquerda', 't-invertido', 'u', 'especial'];
var elemento;
var lista_colunas = [];
var sentido = 'baixo'
var linhas = 20;
var colunas = 10;
var tamanho_quadrado = 20;

function criaElemento(){//chamada para criar objetol-esquerda
    var componente = retornaComponente();
    elemento = new Object;
    elemento.tipo = componente;//barra,quadrado,etc
    elemento.top = retornTop(componente);//posiçao vertical do elemento
    elemento.colunas = retornaColunas(componente); // colunas q esse elemento esta ocupando
    elemento.html = criaComponente(componente);
    var jogo = document.getElementById("jogo");
    var elemento_atual = document.getElementById("elemento-atual");
    jogo.innerHTML = jogo.innerHTML + elemento.html;
    posicionar();
}

function retornaComponente(){
    var max = lista_elementos.length - 1;
    var indice = Math.floor(Math.random() * (0 - max) + max);
    return lista_elementos[indice];
}

function criaComponente(componente){
    obj = document.getElementById(componente).innerHTML;
    var html = 
    "<div id='elemento-atual'>" + obj + "</div>"
    return html;
}

function retornTop(componente) {
    var topo = -linhas*20;
    topo -= retornaAlturaComponente(componente);
    return topo;
}

function retornaAlturaComponente(componente) {
    if ('barra' == componente){
        return 80;
    }
    else if ('quadrado' == componente){
        return 40;
    }
    else if ('l-direita' == componente){
        return 60;
    }
    else if ('l-esquerda' == componente){
        return 60;
    }
    else if ('t-invertido' == componente){
        return 40;
    }
    else if ('u' == componente){
        return 40;
    }
    else if ('especial' == componente){
        return 20;
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

function descida(valor){
    interromper()
    if (sentido == 'cima'){
        valor = - valor;
    }
    elemento.top += valor;
    posicionar();
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
    } else {
        sentido = 'cima';
    }

    
}

// criar eventos de chamada do teclado

function mover_direta(){
    
}

function mover_esquerda(){

}

function mover_baixo(){

}

function selecionar_tela(){

}