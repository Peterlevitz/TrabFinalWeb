function descidaDePixels(pix) {
    document.getElementById(pix).style.top = parseInt(document.getElementById(pix).style.top) + 20;
}

function descerLinhas(position) {
    var Px = 0;
    var Py = 0;
    //Adciona 100 pontos a pontuação toda vez que uma linha for completada
    document.getElementById("score").innerHTML = parseInt(document.getElementById("score").innerHTML) + 100;

    for (c = 1; c < (quantPixel - 3); c++) {//enquanto C for menor q a quantidade de pixeis - 3,
        Px = parseInt(document.getElementById("p" + c).style.left);//o for continua sendo executado
        Py = parseInt(document.getElementById("p" + c).style.top);

        if (Py == position) {
            document.getElementById("p" + c).style.top = "400px";
            document.getElementById("p" + c).style.display = "none";
        }
        if (Py < position) descidaDePixels("p" + c);//enquanto y não for menor q position, não executa a descida
    }
}

//Quando uma linha for completada
function verifLinhas() {
    var overallX = 0;
    for (f = 380; f > 0; f -= 20) {
        overallX = 0;
        for (c = 1; c < (quantPixel - 3); c++) {
            Py = parseInt(document.getElementById("p" + c).style.top);
            if (Py == 0) window.location.reload();
            if (Py == f) totalX++;
        }
        if (overallX == 10) descerLinhas(f);
    }

}

