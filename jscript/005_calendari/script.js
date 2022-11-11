'use strict';

$.openManageMsg = function() {
    $("body").append("<div id='divManageMsg'>")
    $("#divManageMsg").append(`
    <!-- Modal -->
    <div class="modal fade" id="modalcomentari" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-xxl-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="contingutModal">
                    <input id='msg' type='text' value=""></input><br>
                    <button id='save'>Save</button>
                    <button id='delete'>Delete</button>
                    <button id='close'>Close</button>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    `);
}

$.addevent = function() {
    $.openManageMsg();
    $(".diaSetmana,.diaCapSetmana,.diaActual").click(function() {
        let dia = $(this).attr('id');
        let arrayData = dia.split(",");
        let textDia = localStorage.getItem($(this).attr('id'));
        let text = "";
        if (textDia){
            text = textDia;
        }
        $("#msg").val(text);
        $("#ModalLabel").text("Afegir nota pel día, "+nom_dies_setmana[(diaPos(arrayData[2])-1)]+", "+arrayData[2]+" de "+data_actual.toLocaleString('ca-CA', { month: 'long' })+" del "+arrayData[0]);
        $("#save").click(function() {
            let nota = $("#msg").val();
            if (nota){
                localStorage.setItem(dia, nota);
            }
        });
    });

    $("#mesanterior").click(function () { 
        mostrarCalendari((((data_actual.getMonth())-1 < 1) ? data_actual.getFullYear() - 1 : data_actual.getFullYear()), ((data_actual.getMonth()) < 0) ? 12 : (data_actual.getMonth()) - 1);
    });

    $("#messeguent").click(function () { 
        mostrarCalendari((data_actual.getMonth() + 1 > 12) ? data_actual.getFullYear() + 1 : data_actual.getFullYear(), (data_actual.getMonth() + 1 > 12) ? 1 : data_actual.getMonth() + 1)
    });
    $(".diaSetmana,.diaCapSetmana,.diaActual").hover(function() {
        let textDia = localStorage.getItem($(this).attr('id'));
        $(this).css("cursor","pointer").attr("data-bs-target","#modalcomentari").attr("data-bs-toggle","modal");
        $(this).css("opacity","0.7");
        if (textDia){
            $(this).css("cursor","help").attr('title', textDia);
        } else {
            $(this).attr('title', '');
        }
    }, function(){
        $(this).css("opacity","1");
    });
};
const data_actual = new Date();
const nom_dies_setmana = Array("dilluns", "dimarts", "dimecres", "dijous", "divendres", "dissabte", "diumenge");
mostrarCalendari(any(), mes());

function any() {
    return (data_actual.getFullYear());
}

function mes() {
    return (data_actual.getMonth() + 1);
}

//Funció per saber quin dia de la setmana és, el dia 1 del més
function diaPos(dia = 1) {
//Funció per saber quin dia de la setmana és, el dia del més
    let tmp = data_actual.getDate();
    data_actual.setDate(dia);
    let res = data_actual.getDay();
    data_actual.setDate(tmp);
    if (res == 0){
        return 7;
    }else{
        return res;
    }
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

function mostrarCalendari(any, mes) {
    let tmp = data_actual.getDate();
    data_actual.setDate(1);
    data_actual.setMonth(mes-1);
    data_actual.setFullYear(any);
    $("Table").empty();
    let taula = document.getElementById("Table");
    let files = 6;
    if (diaPos() > 5 && (daysInMonth(mes, any)>29)) {
        files++; 
    }
    if (diaPos() == 1 && (data_actual.getMonth()+1) == 2 && (daysInMonth(mes, any)<29)) {
        files--; 
    }
    let columnes = 7;
    let caption = taula.createCaption(); 
    caption.innerHTML = '<input type="button" value="<" id="mesanterior" style="width: 100px; float: left;" class="btn btn-outline-secondary"><h4 class="mes" style="display: inline;">' 
        + data_actual.toLocaleString('ca-CA', { month: 'long' }).toUpperCase() + " del " + any + "</h4>" 
        + '<input type="button" value=">" style="width: 100px; float: right;" class="btn btn-outline-secondary" id="messeguent">';
    caption.className = "text-center";
    let days = daysInMonth(mes, any);
    for (let i = 0; i < files; i++) {
        let fila = taula.insertRow();
        for (let j = 0; j < columnes; j++) {
            if (i == 0) {
                //---Capçalera
                let head = document.createElement("th");
                head.innerHTML = nom_dies_setmana[j];
                head.className = "titolsDiesSetmana";
                fila.appendChild(head);
            } else {
                //---Files
                let cella = fila.insertCell();

                if (!(i == 1 && j < diaPos() - 1 || days == 0)) {
                    days--;
                    cella.innerHTML = data_actual.getDate();
                    if (j < 5) {
                        //Aquesta class esta definida al css perquè posi les celes de color blau
                        cella.className = "diaSetmana";
                    } else {
                        //Aquesta class esta definida al css perquè posi les celes de color vermell
                        cella.className = "diaCapSetmana";
                    }
                    if (data_actual.getDate() == new Date().getDate() && mes == new Date().getMonth() + 1 && any == new Date().getFullYear()) {
                        //Aquesta class esta definida al css perquè posi les celes de color verd
                        cella.className = "diaActual";
                    }
                    cella.setAttribute("id", data_actual.getFullYear() + "," + (data_actual.getMonth()+1) + "," + data_actual.getDate());
                    data_actual.setDate(data_actual.getDate()+1);
                }
            }
        }
    }
    data_actual.setDate(tmp);
    $.addevent();
}