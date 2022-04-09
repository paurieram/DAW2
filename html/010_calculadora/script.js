let punt = false;
let num1 = null;
let num2 = null;
let operador = null;
let borraText = false;
let numResultat = null;
let text = document.getElementById("text");
const E = 2.71828182846;
function amagaMostrarInfo() {
    let calculadora = document.getElementById("calculadoraCientifica");
    if (calculadora.style.display == "inline") {
        calculadora.style.display = "none";
    } else {
        calculadora.style.display = "inline";
    }
}
function num(n) {
    if (text.value == 0 && n != "." && text.value != "0.") {//axafar 0
        text.value = n;
    } else {//altres nombres
        if (n != ".") {
            if (borraText) {
                text.value = n;
                borraText = false;
            } else {
                if (text.value == numResultat){
                    text.value = parseFloat(n);
                }else{
                    text.value += "" + n;
                }
            }
        } else if (punt == false) {
            text.value += "" + n;
            punt = true;
        }
    }
}
function operacio(opera) {
    if (opera != "=" || num1 != null && operador != null && opera == "=" || opera != "=") {
        punt = false;
        if (operador == null && opera != "=") {
            operador = opera;
        }
        if (num1 == null) {
            num1 = parseFloat(text.value);
            //console.log(num1);
            text.value = 0;
        } else if (num2 == null) {
            num2 = parseFloat(text.value);
            console.log(num2);
            text.value = 0;
        }
        console.log(num1+" "+operador+" "+num2)
    }
    if (num1 != null && num2 != null) {

        switch (operador) {
            case "+":
                sumar();
                break;
            case "-":
                restar();
                break;
            case "*":
                multiplicar();
                break;
            case "/":
                dividir();
                break;
        }
        operador = null;
    }
}
function reset() {
    num1 = null;
    num2 = null;
    operador = null;
    punt = false;
}
//operacions
function borrar() {
    text.value = 0;
    numResultat = null;
    reset();
}
function sumar() {
    text.value = num1 + num2;
    numResultat = text.value;
    reset();
}
function restar() {
    text.value = num1 - num2;
    numResultat = text.value;
    reset();
}
function multiplicar() {
    text.value = num1 * num2;
    numResultat = text.value;
    reset();
}
function dividir() {
    if (num2 != 0) {
        text.value = num1 / num2;
        numResultat = text.value;
        reset();
    } else {
        console.log('/0');
    }
}
function canviSimbol() {
    text.value *= -1;
}
function pi() {
    text.value = Math.PI;
    borraText = true;
}
function sqrt() {
    text.value = Math.sqrt(text.value);
}
function logartimoN10() {
    text.value = Math.LN10;
}
function logaritmo() {
    if (text.value > 0) {
        text.value = Math.log(text.value);
    }
}
function e() {
    text.value = E;
    num(E);
    borraText = true;
}
function sinus() {
    text.value = Math.sin(text.value);
}
function asinus() {
    text.value = Math.asin(text.value);
}
function cosinus() {
    text.value = Math.cos(text.value);
}
function tangent() {
    text.value = Math.tan(text.value);
}

function quadrat() {
    text.value = Math.pow(text.value, 2);
}

function secant() {
    if (text.value != 0) {
        text.value = 1 / Math.cos(text.value);
    }

}
function cotagent() {
    if (text.value != 0) {
        text.value = 1 / Math.tan(text.value);
    }
}

function arrodAdalt() {
    text.value = Math.ceil(text.value);
}

function arrod() {
    text.value = Math.round(text.value);
}

function arrodAbaix() {
    text.value = Math.floor(text.value);
}