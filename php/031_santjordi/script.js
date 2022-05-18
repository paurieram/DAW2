let winers = [];
$(document).ready(function () {
    let votar;
    let pujar;
    let accio;
    let obra;
    let num = 0;
    let maxnum = 0;
    let out = "";
    let obres = [];
    let cat = "";
    $.ajax({// ask variables
        data:  {"op": "session"},
        url:   'ajx/showobra.php',
        type:  'post',
        dataType: 'json',
        async: false,
        success:  function (response) {
            votar = response.vots;
            pujar = response.upl;
            accio = response.acc;
            catvots = response.cat;
            let tmpwiners = response.win;
            for (let index = 0; index < tmpwiners; index++) {
                winers[index] = false;
                obres[index] = -1;
            }
        }
    });
    window.setTimeout(function () {// delete alert in 3s
        $("#spanLogin").text("");
        $("#spanLogin").removeClass("alert-success alert-danger");
    }, 3000);
    $(".confirmarBot").click(function() {// confirm votes
        $("#"+obra).removeClass("fa-light").addClass("fa-solid").removeAttr("data-bs-toggle");
        // $("#"+obra).off("click","#"+obra);
        $.ajax({
            data:  {"op": "vote","idobra": obra},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json'
        });
        catvots[$("#"+obra).attr("cat")] += 1;
        $.showtab(num);
    });
    $.hid = function() {// hide windows
        $("#pujarObra").hide();
        $("#ownObres").hide();
        $("#botonsAmagats").hide();
        $("#votarObra").hide();
    }
    $(".forgotPass").click(function () {// show forgot password
        $("#forgotForm").toggle();
        $("#loginForm").toggle();
        $("span").text("");
    });
    $(".vot").click(function () {// show vote menu
        $.hid();
        $.ajax({
            data:  {"op": "all"},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                table = response.data;
                maxnum = response.data.length;
                out = "#obrestable";
                num=0;
                $.showtab(num);
            }
        });
        $("#votarObra").show();
    });
    $(".new").click(function () {// show new artwork
        $.hid();
        $("#pujarObra").show();
    });
    $(".tornarmenu").click(function () {// show main menu
        $.hid();
        $("#botonsAmagats").show();
    });
    $(".tornarpujar").click(function () {// show new artwork
        $.hid();
        $("#pujarObra").show();
    });
    $(".menuObres").click(function () {// show user artworks
        let htm = "";
        $.hid();
        $.ajax({
            data:  {"op": "own"},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                table = response;
                maxnum = table.data.length;
                out = "#myobrestable";
                num=0;
                $.showtab(num);
            }
        });
        $("#ownObres").show();
    });
    $(".confirmarDel").click(function() {// delete artwork
        $.ajax({
            data:  {"op": "delete","idobra": $(this).attr("name")},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                $.showtab(num);
            }
        });
    });
    $("#o1").click(function () {// pagination first
        num=0;
        $.showtab(num);
    });
    $("#o2").click(function () {// pagination previous
        if (num-5 >= 0){
            num-=5;
            $.showtab(num);
        }
    });
    $("#o3").click(function () {// pagination next
        if (num+5 < maxnum){
            num+=5;
            $.showtab(num);
        }
    });
    $("#o4").click(function () {// pagination last
        num=maxnum-(maxnum%5);
        $.showtab(num);
    });
    $.clasad = function(votsuser=0,idusr,selfvote){
        $(".adclas").each(function() {
            if ($(this).attr("idaut") == idusr && !selfvote){//obra del autor && votarse a si mateix (variable)
                $(this).removeClass("adclas").addClass("grey fa-solid fa-star-exclamation fa-3x");
            }else {
                for (let i = 0; i < votsuser.length; i++){
                    if (votsuser[i].idobra == $(this).attr("id")){// obra votada
                        $(this).removeClass("adclas").addClass("yellow fa-solid fa-star-sharp fa-3x");
                    }
                }
            }
            if ($(this).hasClass("adclas")){
                if (catvots[cat] < votar){
                    $(this).removeClass("adclas").addClass("yellow fa-light fa-star-sharp fa-3x").attr("data-bs-toggle","modal").css("cursor", "pointer");
                }else{
                    $(this).removeClass("adclas").addClass("yellow fa-light fa-star-sharp fa-3x");
                }
            }
        });
    }
    $("#all").change(function () {// show tables
        $.showtab(num);
    });
    $.showtab = function(num) {
        cat = $("#all option:selected").val();
        if (out == "#myobrestable"){// pagination from user artwork
            let htm = "";
            if (maxnum > 0){
                htm += "<table class='table mb-5'><th class='col'><h2><b>Títol</b></h2></th><th class='col'><h2><b>Categoria</b></h2></th><th class='col'><h2><b>Obra</b></h2></th><th class='col'><h2><b>Accions</b></h2></th>";
                for (let tmp = num; tmp != (num+5) && tmp < table.data.length; tmp++) {
                    htm += "<tr><td scope='row'><h2>"+table.data[tmp].titolobra+"</h2></td><td scope='row'><h2>"+table.data[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table.data[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table.data[tmp].idobra+"' name='"+table.data[tmp].titolobra+"' class='fa-regular fa-trash-can fa-3x' style='cursor: pointer;'></i></td></tr>";
                }
                htm +="</table>";
            }else{
                htm += "<h2 class='offset-3 my-5'>Encara no tens cap obra publicada!</h2>";
            }
            $(out).html(htm);
            $(".fa-trash-can").click(function () {// send confirmation modal to delete artwork
                $("#titolmodal2").text("Confirmació de l'eliminació de l'obra '"+ $(this).attr("name") + "'");
                $("#modalDel").modal("show");
                $(".confirmarDel").attr("name",$(this).attr("id"));
            });
        }else { // pagination from all user artworks
            let htm = "";
            let votsuser = false;
            let idusr;
            let selfvote;
            $.ajax({
                data:  {"op": "resxcat","idc": cat},
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
            if (result){
                htm += "<table class='table mb-5'><th class='col'><h2><b>Títol</b></h2></th><th><h2 class='col'><b>Obra</b></h2></th><th><h2 class='col'><b>Posició</b></h2></th>";
                let atmp = [];
                resdat.forEach(winers => {
                    table.forEach(all => {
                        if (all.idobra == winers.idobra){
                            atmp[winers.posicio] = "<tr><td scope='row'><h2>"+ all.titolobra +"</h2></td><td class='tdTable'><a href='"+all.nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i class='fa-solid fa-square-"+winers.posicio+" fa-3x'></i></td></tr>";
                        }
                    });
                });
                atmp.forEach(element => {
                    htm += element;
                });
                htm += "</table>";
                $(out).html(htm);
            }else{
                let tmp = false;
                htm += "<table class='table mb-5'><th class='col'><h2><b>Títol</b></h2></th><th><h2 class='col'><b>Categoria</b></h2></th><th><h2 class='col'><b>Obra</b></h2></th><th><h2 class='col'><b>Vot</b></h2></th>";
                $.ajax({
                    data:  {"op": "votsusr"},
                    url:   'ajx/showobra.php',
                    type:  'post',
                    dataType: 'json',
                    async: false,
                    success:  function (response) {
                        votsuser = response.data;
                        idusr = response.idusr;
                        selfvote = response.selfvote;
                    }
                });
                table.forEach(all => {
                    if (all.idcategoriaobra == cat){
                        tmp = true;
                        htm += "<tr><td scope='row'><h2>"+ all.titolobra +"</h2></td><td class='tdTable'><h2>"+all.nomcategoria+"</h2></td><td class='tdTable'><a href='"+all.nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+all.idobra+"' name='"+all.titolobra+"' idaut='"+all.idusuariautor+"' cat='"+all.idcategoriaobra+"' class='adclas'></i></td></tr>";
                    }
                });
                if (tmp == false){
                    htm = "<h2 class='offset-1 my-5'>Encara no hi ha cap obra publicada! :´(</h2>";
                    $(out).html(htm);
                }else{
                    htm += "</table>";
                    $(out).html(htm);
                    $.clasad(votsuser,idusr,selfvote);
                    $.createVote();
                }
            }
        }
    }
    $.createVote = function() {// vote
        $(".fa-light.fa-star-sharp").on("click", function () {
            if (catvots[$(this).attr("cat")] < votar){
                obra = $(this).attr("id");
                $("#titolmodal").text("Confirmació del vot a l'obra '"+ $("#"+obra).attr("name") + "'");
                $("#modalVot").modal("show");
            }
        });
    }
    if (accio==1){// redirect vote artwork
        $("#btnvote").trigger("click");
    }
    if (accio==2){// redirect upload artwork
        $("#btnupload").trigger("click");
    }
    if (accio==3){// redirect own artwork
        $("#btnupload").trigger("click");
        $(".menuObres").trigger("click");
    }
});