function suma(){
    if (isNaN(document.getElementById("primerNombre").value+document.getElementById("segonNombre").value)) {
        alert("No has introduit nombres");
    }else{
        document.getElementById("resultat").innerHTML = parseInt(document.getElementById("primerNombre").value)+parseInt(document.getElementById("segonNombre").value);
    }
}
function resta(){
    if (isNaN(document.getElementById("primerNombre").value+document.getElementById("segonNombre").value)) {
        alert("No has introduit nombres");
    }else{
        document.getElementById("resultat").innerHTML = parseInt(document.getElementById("primerNombre").value)-parseInt(document.getElementById("segonNombre").value);
    }
}
function producte(){
    if (isNaN(document.getElementById("primerNombre").value+document.getElementById("segonNombre").value)) {
        alert("No has introduit nombres");
    }else{
        document.getElementById("resultat").innerHTML = parseInt(document.getElementById("primerNombre").value)*parseInt(document.getElementById("segonNombre").value);
    }
}
function divisio(){
    if (isNaN(document.getElementById("primerNombre").value+document.getElementById("segonNombre").value)) {
        alert("No has introduit nombres");
    }else{
        if (parseInt(document.getElementById("segonNombre").value)!=0){
            document.getElementById("resultat").innerHTML = parseInt(document.getElementById("primerNombre").value)/parseInt(document.getElementById("segonNombre").value);
        }else{
            alert("No pots dividir per 0");
        }
    }

}