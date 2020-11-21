var lista_elementos = ['barra', 'quadrado', 'l-direita', 'l-esquerda', 't-invertido', 'u', 'especial'];
var elemento;
var lista_colunas = [];
var sentido = 'baixo'

function criaElemento(){//chamada para criar objeto

    elemento = new Object;
    elemento.tipo = '';//barra,quadrado,etc
    elemento.top = '';//posiçao vertical do elemento
    elemento.colunas = []; // colunas q esse elemento esta ocupando

    posicionar();
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

}

function interromper(){
    // verificar o sentido antes de interromper

    verifica_eliminar_linha();
}

function verifica_eliminar_linha(){
    //percorrer as linha
        elimina_linha();

}

function elimina_linha(){
    if ( tem especial){

    }
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