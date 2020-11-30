var linhas_el[i].innerHTML = document.getElementById('jogo').getElementsByClassName('alinhamento-horizontal');

function descidaDePixels(pix) {
    linhas_el[i].innerHTML(pix)=linhas_el[i].innerHTML(pix+1);
}

function descerLinhas(position) {
    var Px = 0;
    var Py = 0;
    //Adciona 100 pontos a pontuação toda vez que uma linha for completada
    document.getElementById("score").innerHTML = parseInt(document.getElementById("score").innerHTML) + 100;

    for (c = 1; c < linhas_el[i].innerHTML; c++) {//enquanto C for menor q a quantidade de pixeis - 3,
        Px = parseInt(document.getElementById("p" + c).style.left);//o for continua sendo executado
        Py = parseInt(document.getElementById("p" + c).style.top);

        if(linhas_el[i].innerHTML==10){
            if (Py == position) {
                document.getElementById("p" + c).style.top = "180px";
                document.getElementById("p" + c).style.display = "none";
            }
            if (Py < position) descidaDePixels("p" + c);//enquanto y for menor q position, executa a descida
        }else{
            if (Py == position) {
                document.getElementById("p" + c).style.top = "396px";
                document.getElementById("p" + c).style.display = "none";
            }
            if (Py < position) descidaDePixels("p" + c);//enquanto y for menor q position, executa a descida
        }
    }
}

//Quando uma linha for completada
function verifLinhas() {
    var overallX = 0;
    if(linhas_el[i].innerHTML==10){
        for (f = 162; f > 0; f -= 18) {
            overallX = 0;
            for (c = 1; c < (quantPixel - 3); c++) {
                Py = parseInt(document.getElementById("p" + c).style.top);
                if (Py == 0) window.location.reload();
                if (Py == f) overallX++;
            }
        }
        if (overallX == 10 | 22) descerLinhas(f);//caso uma linha esteja cheia, tanto no tabuleiro 10 x 20 quanto no 22 x 44, executa a descida
    }else{     
        for (f = 378; f > 0; f -= 18) {
            overallX = 0;
            for (c = 1; c < (quantPixel - 3); c++) {
                Py = parseInt(document.getElementById("p" + c).style.top);
                if (Py == 0) window.location.reload();
                if (Py == f) overallX++;
            }
        if (overallX == 10 | 22) descerLinhas(f);//caso uma linha esteja cheia, tanto no tabuleiro 10 x 20 quanto no 22 x 44, executa a descida
        }
    }

    
    }
}
