window.onload = setTimeout(() => {
    $('#sidebar, #content').toggleClass('active');
}, 10000);
let f = 0;
let m = 1;
var categ=[1,2,1];

$("#cfemeni").change(function() {
    if (categ[f] != 0){
        categ[f] = 0;
        if (categ[m]!=0){//masculi activat
            get2Alumnes(categ[m]);
        }else if (categ[m]==0){//masculi desactivat
            $("#contenttable").html("No hi han resultats");
        }
    }else if (categ[f] == 0){//
        categ[f] = categ[2];
        if (categ[m]!=0){//masculi activat
            get2Alumnes(categ[f],categ[m]);
        }else if (categ[m]==0){//masculi desactivat
            get2Alumnes(categ[f]);
        }
    }
    if (categ[f]==0){
        console.log("femeni desactivat");
    }else{
        console.log("femeni activat");
    }
    if (categ[m]==0){
        console.log("masculi desactivat");
    }else{
        console.log("masculi activat");
    }
});

$("#cmasculi").change(function() {
    if (categ[m] != 0){//masculi activat
        categ[m] = 0;
        if (categ[f]!=0){//femeni activat
            get2Alumnes(categ[0]);
        }else if (categ[f]==0){//femeni desactivat
            $("#contenttable").html("No hi han resultats");
        }
    }else if (categ[m] == 0){//masculi desactivat
        categ[1] = categ[2]+1;
        if (categ[f]!=0){//femeni activat
            get2Alumnes(categ[f],categ[m]);
        }else if (categ[f]==0){//femeni desactivat
            get2Alumnes(categ[m]);
        }
    }
    if (categ[f]==0){
        console.log("femeni desactivat");
    }else{
        console.log("femeni activat");
    }
    if (categ[m]==0){
        console.log("masculi desactivat");
    }else{
        console.log("masculi activat");
    }
});   

function get2Alumnes(grup,num2,reset=false) {//control.html
    crono()
    var parametres = {
        "num": grup,
        "num2": num2
    };
    $.ajax({
        data: parametres,
        url: '../dadescontrol.php',
        type: 'post',
        dataType: 'html',
        beforeSend: function () {
            $("#contenttable").html("Procesando, espere por favor...");
        },
        success: function (response) {
            $("#contenttable").html(response);
        }
    });
    if (reset){
        $("#cmasculi").prop("checked",true);
        $("#cfemeni").prop("checked",true);
        categ = [parseInt(grup),parseInt(grup+1),parseInt(grup)];
    }
}

let timeout=null;
$(function () {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        if (!$("#content").hasClass("active")) {
            if (timeout!=null){
                clearTimeout(timeout);
            }
            timeout = setTimeout(() => {
                if (!$("#content").hasClass("active")) {
                    $('#sidebar, #content').toggleClass('active');
                }
            }, 5000);
        }
    });
});
/* Cronometro */
var centesimas = 0;
var segundos = 0;
var minutos = 0;
function inicio() {
    control = setInterval(cronometro, 10);
    document.getElementById("inicio").disabled = true;
    document.getElementById("parar").disabled = false;
    document.getElementById("continuar").disabled = true;
    document.getElementById("reinicio").disabled = false;
}
function parar() {
    clearInterval(control);
    document.getElementById("parar").disabled = true;
    document.getElementById("continuar").disabled = false;
}
function reinicio() {
    clearInterval(control);
    centesimas = 0;
    segundos = 0;
    minutos = 0;
    Centesimas.innerHTML = "00";
    Segundos.innerHTML = "00";
    Minutos.innerHTML = "00";
    document.getElementById("inicio").disabled = false;
    document.getElementById("parar").disabled = true;
    document.getElementById("continuar").disabled = true;
    document.getElementById("reinicio").disabled = true;
}
function cronometro() {
    if (centesimas < 99) {
        centesimas++;
        if (centesimas < 10) { centesimas = "0" + centesimas }
        Centesimas.innerHTML = centesimas;
    }
    if (centesimas == 99) {
        centesimas = -1;
    }
    if (centesimas == 0) {
        segundos++;
        if (segundos < 10) { segundos = "0" + segundos }
        Segundos.innerHTML = segundos;
    }
    if (segundos == 59) {
        segundos = -1;
    }
    if ((centesimas == 0) && (segundos == 0)) {
        minutos++;
        if (minutos < 10) { minutos = "0" + minutos }
        Minutos.innerHTML = minutos;
    }
    if (minutos == 59) {
        minutos = -1;
    }
    if ((centesimas == 0) && (segundos == 0) && (minutos == 0)) {
        horas++;
        if (horas < 10) { horas = "0" + horas }
        Horas.innerHTML = horas;
    }

}
function getAlumnes(grup) {//index.html
    var parametres = {
        "valgrp": grup
    };
    $.ajax({
        data: parametres,
        url: 'getAlumnes.php',
        type: 'post',
        dataType: 'html',
        beforeSend: function () {
            $("#contenttable").html("Procesando, espere por favor...");
        },
        success: function (response) {
            $("#contenttable").html(response);
        }
    });
}

document.getElementById('dorsal').onkeyup = function (ev) {
    var el = document.getElementById('dorsal');
    let state = document.getElementById('res');
    let show = document.getElementById('sh');
    if (el.value.length == 3) {
        var e = jQuery.Event("keypress");
        //   e.which = 13; //choose the one you want
        //   e.keyCode = 13;
        //   $("#dorsal").trigger(e);
        console.log("X3");
        el.value = "";
        show.style = "display: block";
        state.innerHTML = " Correctament";
    } else if (el.value.length > 3) {
        el.value = "";
        show.style = "display: block";
        state.innerHTML = " Incorrectament";
    };
}

function crono(bolear=false) {
    let temps = document.getElementById('crono').innerHTML;
if (bolear) {
temps = '<div class="col-3 row container d-inline-flex"><div class="reloj col-3 fs-1" id="Minutos">00</div><div class="reloj col-3 fs-1" id="Segundos">00</div><div class="reloj col-3 pt-2" id="Centesimas">00</div>'+
        '</div><input type="button" class="boton" id="inicio" value="Start &#9658;" onclick="inicio();"><input type="button" class="boton" id="parar" value="Stop &#8718;" onclick="parar();" disabled>'+
        '<input type="button" class="boton" id="continuar" value="Reprendre &#8634; " onclick="inicio();" disabled><input type="button" class="boton" id="reinicio" value="Reset &#8635;" onclick="reinicio();" disabled>'
} else {
    temps = "";
}
document.getElementById('crono').innerHTML = temps;
}

