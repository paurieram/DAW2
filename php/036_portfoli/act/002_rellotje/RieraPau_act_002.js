window.onload = Update;
function Update(){
    let data = new Date();
    document.getElementById("rellotge").innerHTML = addZ(data.getHours())+":"+addZ(data.getMinutes())+":"+addZ(data.getSeconds())
    setTimeout(Update,1000)
}

function Info() {
    let data = new Date();
    if (document.getElementById("amaga_mostra").innerHTML == "Amaga"){
        document.getElementById("amaga_mostra").innerHTML = "Mostra";
        document.getElementById("missatge").innerHTML = "";
    }else{
        document.getElementById("amaga_mostra").innerHTML = "Amaga";
        if (data.getHours() < 14 && data.getHours() > 7){
            document.getElementById("missatge").innerHTML = "Bon Dia!";
        }else if (data.getHours() < 18 && data.getHours() > 14){
            document.getElementById("missatge").innerHTML = "Bona Tarda!";
        }else if (data.getHours() < 20 && data.getHours() > 18){
            document.getElementById("missatge").innerHTML = "Bon Vespre!";
        }else if (data.getHours() < 7 || data.getHours() > 20){
            document.getElementById("missatge").innerHTML = "Bona Nit!";
        }
    }
}

function addZ(i){
    if(i<10){
        i="0"+i
    }
    return i;
}