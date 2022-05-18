let obres = [];
$(document).ready(function () {
    let cat;
    $.selectPosition = function () {
        $("#adminTable tr td i.fa-square").click(function () {// admin number select
            if ($(this).hasClass("squareclk")){
                for (let c = 0; c < winers.length; c++) {
                    if ($(this).hasClass("fa-square-"+(c+1))){
                        $(this).removeClass("fa-solid fa-square-"+(c+1)+" squareclk").addClass("fa-light fa-square");
                        winers[c] = false;
                        obres[c] = -1;
                    }
                }
            }else{
                for (let c = 0; c < winers.length; c++) {
                    if (!winers[c]) {
                        $(this).removeClass("fa-light fa-square").addClass("fa-solid fa-square-"+(c+1)+" squareclk");
                        winers[c] = true;
                        obres[c] = $(this).attr("id");
                        return;
                    }
                }
            }
        });
    }
    $("#adm").change(function () {// show admin tables
        $.showAdminTables($("select option:selected").val());
    });
    $.disableObra = function(){
        $(".fa-eye, .fa-eye-slash").click(function () {
            if ($(this).hasClass("fa-eye")){
                $(this).removeClass("fa-eye").addClass("fa-eye-slash");
                $.ajax({
                    data: {"op": "chvisibility","id": $(this).attr("id"), "data": 0},
                    type: "post",
                    url: "ajx/showobra.php",
                    dataType: "json",
                    success: function (response) {
                    }
                });
             }else{
                $(this).removeClass("fa-eye-slash").addClass("fa-eye");
                $.ajax({
                    data: {"op": "chvisibility","id": $(this).attr("id"), "data": 1},
                    type: "post",
                    url: "ajx/showobra.php",
                    dataType: "json",
                    success: function (response) {
                    }
                });
            }
        });
    }
    $.showAdminTables = function(categ) {
        cat = categ;
        let result;
        let resdat;
        $.ajax({
            data:  {"op": "resxcat","idc": categ},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                result = response.result;
                resdat = response.data;
                if (result){
                   $("#publicar").attr("disabled", true).removeClass("btn-outline-danger").addClass("btn-outline-secondary");
                }else{
                    $("#publicar").removeAttr("disabled").removeClass("btn-outline-secondary").addClass("btn-outline-danger");
                }
            }
        });
        $.ajax({
            data: {"op": "obresxcat","idc": categ},
            url: 'ajx/showobra.php',
            type: 'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                if (!response) {
                    $(".tableadm").html('<h2 class="my-5 text-center"><span class="offset-2">No hi han Obres!!!</span></h2>');
                    return;
                }
                let htm = "<table class='table mb-5' id='adminTable'><th class='col'><h2><b>Títol</b></h2></th><th><h2 class='col'><b>Obra</b></h2></th><th><h2 class='col'><b>Vots</b></h2></th><th><h2 class='col'><b>Podi</b></h2></th><th><h2 class='col'><b>Visible</b></h2></th>";
                for (let c = 0; c < response.data.length; c++) {
                    if (response.data[c].activa == 1) {
                        htm += "<tr><td scope='row'><h2>"+response.data[c].titolobra+"</h2></td><td class='tdTable'><a href='"+response.data[c].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><h2>"+response.data[c].vots+"</h2></td><td class='tdTable square'><i id='"+response.data[c].idobra+"' name='"+response.data[c].titolobra+"' class='fa-light fa-square fa-3x'></i></td><td class='tdTable'><i id='"+response.data[c].idobra+"' class='fa-solid fa-eye fa-3x'></i></td></tr>";
                    } else {
                        htm += "<tr><td scope='row'><h2>"+response.data[c].titolobra+"</h2></td><td class='tdTable'><a href='"+response.data[c].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><h2>"+response.data[c].vots+"</h2></td><td class='tdTable square'><i id='"+response.data[c].idobra+"' name='"+response.data[c].titolobra+"' class='fa-light fa-square fa-3x'></i></td><td class='tdTable'><i id='"+response.data[c].idobra+"' class='fa-solid fa-eye-slash fa-3x'></i></td></tr>";
                    }
                }
                htm += "</table>";
                $(".tableadm").html(htm);
                if (!result){
                    $.selectPosition();
                }
                for (let c = 0; c < winers.length; c++) {
                    winers[c] = false;
                    obres[c] = -1;
                }
                if (!result){
                    $.disableObra();
                }
                $("#publicar").attr("num", categ);
                if (result){
                    $(".fa-square").each(function() {
                        for (let i = 0; i < resdat.length; i++) {
                            if ($(this).attr("id") == resdat[i].idobra) {
                                $(this).removeClass("fa-light fa-square").addClass("fa-solid fa-square-"+resdat[i].posicio);
                            }
                        }
                    });
                }
            }
        });
    }
    $.showAdminTables($("select option:selected").val());
    $("#publicar").click(function() {
        let tmp = 0;
        let limitpodi;
        let per = false;
        let htm = "Obres: <br>";
        $.ajax({
            data:  {"op": "limit"},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                limitpodi = response.data;
            }
        });
        obres.forEach(element => {
            if (!limitpodi){
                if (element == -1){
                    per = true;
                    $("#titolm").text("No hi ha suficients Obres seleccionades");
                    $(".confirmarPbl").hide();
                    $("#mbody").html("");
                }
            }
        });
        if (!per){
            $("#titolm").text("PUBLICAR LA CATEGORIA: "+$("select option:selected").text());
            obres.forEach(element => {
                tmp++;
                if (element != -1){
                    htm += "<b>"+tmp+"</b> - "+$("#"+element).attr("name")+"<br>";
                }
            });
            $(".confirmarPbl").show();
            $("#mbody").html(htm);
        }
        $("#modalpubli").modal("show");
    });
    $(".confirmarPbl").click(function() { 
        $.ajax({
            data:  {"op": "publicat", "cat": $("select option:selected").val(), "data": obres},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
            }
        });
        $.showAdminTables(cat);
    });
});