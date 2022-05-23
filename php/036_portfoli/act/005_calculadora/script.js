let punt = false;
let num1 = null;
let num2 = null;
let operador = null;
let text = document.getElementById("text");
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
            text.value += "" + n;
        } else if (punt == false) {
            text.value += "" + n;
            punt = true;
        }
    }
}
function operacio(opera) {
    if(operador==null){
        operador = opera;
    }
    if(num1==null){
        num1 = text.value;
        text.value = "";
    }else if(num2==null){
        num2 = text.value;
        text.value = "";
    }
    if(num1!=null && num2!=null){
        switch (operador) {
            case "+":
                sumar();
                break;
            case "-":
                restar();
                break;
        
        }
    }
}
function reset() {
    num1 = null;
    num2 = null;
}
//operacions
function borrar() {
    text.value = 0;
    reset();
}
function sumar() {
    text.value = num1 + num2;
    reset();
}
function restar() {
    text.value = num1 - num2;
    reset();
}
function multiplicar() {
    text.value = num1 * num2;
    reset();
}
function dividir() {
    if(num2!=0){
        text.value = num1 / num2;
        reset();
    }else{
        console.log('/0');
    }
}
