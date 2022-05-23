let matriu = [[0, 0, 0], [0, 0, 0], [0, 0, 0]];
let win = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
let array = [0, 0, 0, 0, 0, 0, 0, 0, 0];
let fil = 0;
let col = 0;
let id9;
window.onload = start();
function start() {
    for (let i = 0; i != 9;) {
        let x = rng();
        if (array[i] == 0 && !(array.includes(x))) {
            array[i] = x;
            document.getElementById(i + 1).innerHTML = "<img src='./img/" + x + ".png' alt=' '>";
            i++;
            if (x == 9) {
                id9 = i;
            }
        }
    }
    for (let i = 0, k = 0; i < matriu.length; i++) {
        for (let j = 0; j < matriu.length; j++, k++) {
            matriu[i][j] = array[k];
        }
    }

    for (let i = 0; i < matriu.length; i++) {
        for (let j = 0; j < matriu.length; j++) {
            if (matriu[i][j] == 9) {
                fil = i;
                col = j;
            }
        }
    }

    document.getElementById("tmps").value = 0;
}
function sw(fila, columna, id) {
    let tmp;
    document.getElementById(id9).innerHTML = document.getElementById(id).outerHTML;
    document.getElementById(id).innerHTML = "";
    id9 = id;
    tmp = matriu[fila][columna];
    matriu[fila][columna] = matriu[fil][col];
    matriu[fil][col] = tmp;
    fil = fila;
    col = columna;
}
function move(fila, columna, id) {
    if (document.getElementById("tmps").value == 0) {
        t();
    }
    if (fila + 1 == fil && columna == col) {
        sw(fila, columna, id);
    } else if (fila - 1 == fil && columna == col) {
        sw(fila, columna, id);
    } else if (columna + 1 == col && fila == fil) {
        sw(fila, columna, id);
    } else if (columna - 1 == col && fila == fil) {
        sw(fila, columna, id);
    }
    for (let i = 0, k = 0; i < matriu.length; i++) {
        for (let j = 0; j < matriu.length; j++) {
            if (matriu[i][j] == win[i][j]) {
                k++;
            }
        }
        if (k == 9) {
            let temps = document.getElementById("tmps").value;
            alert("Has guanyat\n Has trigat exactament " + temps + " segons");
        }
    }
    console.log(matriu + " - " + win);
}
function t() {
    document.getElementById("tmps").value++;
    setTimeout(t, 1000);
}
function rng() {
    return parseInt(Math.random() * (10 - 1) + 1);
}