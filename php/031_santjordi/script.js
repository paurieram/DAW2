$(document).ready(function () {
    let votar;
    let pujar;
    let accio;
    let obra;
    let num = 0;
    let maxnum = 0;
    let winers = [];
    let out = "";
    $.ajax({// ask variables
        data:  '',
        url:   'ajx/session.php',
        type:  'post',
        dataType: 'json',
        async: false,
        success:  function (response) {
            votar = response.vots;
            pujar = response.upl;
            accio = response.acc;
            let tmpwiners = response.win;
            for (let index = 0; index < tmpwiners; index++) {
                winers[index] = false;
            }
        }
    });
    window.setTimeout(function () {// delete alert in 3s
        $("#spanLogin").text("");
        $("#spanLogin").removeClass("alert-success alert-danger");
    }, 3000);
    $(".confirmarBot").click(function() {// confirm votes
        if (votar > 0){
            $("#"+obra).removeClass("fa-light").addClass("fa-solid").removeAttr("data-bs-toggle");
            $("#"+obra).off("click","#"+obra);
            $.ajax({
                data:  {"idobra": obra},
                url:   'ajx/vote.php',
                type:  'post',
                dataType: 'html'
            });
            votar-1;
        }
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
    $(".fa-trash-can").click(function () {// send confirmation modal to delete artwork
        $("#titolmodal2").text("Confirmació de l'eliminació de l'obra '"+ $(this).attr("name") + "'");
        $("#modalDel").modal("show");
        $(".confirmarDel").attr("name",$(this).attr("id"))
        
    });
    $(".confirmarDel").click(function() {// delete artwork
        $.ajax({
            data:  {"idobra": $(this).attr("name")},
            url:   'ajx/delete.php',
            type:  'post',
            dataType: 'html',
            async: false,
            success:  function (response) {
                window.location.href="menu.php?acc=3";
            }
        });
    });
    $("#o1, #v1").click(function () {// pagination first
        num=0;
        $.showtab(num);
    });
    $("#o2, #v2").click(function () {// pagination previous
        if (num-5 >= 0){
            num-=5;
            $.showtab(num);
        }
    });
    $("#o3, #v3").click(function () {// pagination next
        if (num+5 < maxnum){
            num+=5;
            $.showtab(num);
        }
    });
    $("#o4, #v4").click(function () {// pagination last
        num=maxnum-(maxnum%5);
        $.showtab(num);
    });
    $.clasad = function(votsuser,idusr,selfvote){
        $(".adclas").each(function() {
            $(this).removeClass("adclas");
            if (votsuser != false){//no vots (vots)
                let fnd = false;
                table.forEach(element => {
                    if (element.idusuariautor == idusr){//votarse a si mateix
                        if (!selfvote){//votarse a si mateix (variable)
                            $(this).addClass("grey fa-solid fa-star-exclamation fa-3x");
                        //  htm += "<tr><td scope='row'><h2>"+ table[tmp].titolobra +"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='grey fa-solid fa-star-exclamation fa-3x''></i></td></tr>";
                        }else{
                            for (let i = 0; i < votsuser.length; i++) {
                                if(votsuser[i].idobra == "table[tmp].idobra"){//comparar si la obra es del usuari actual esta votada
                                    $(this).addClass("yellow fa-solid fa-star-sharp fa-3x");
                                    // htm += "<tr><td scope='row'><h2>"+ table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+ table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+ table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+ table[tmp].idobra+"' name='"+ table[tmp].titolobra+"' class='yellow fa-solid fa-star-sharp fa-3x'></i></td></tr>";
                                    fnd = true;
                                    break;
                                }
                            }
                            if (!fnd){
                                $(this).addClass("yellow fa-light fa-star-sharp fa-3x").attr("data-bs-toggle","modal");
                                // htm += "<tr><td scope='row'><h2>"+table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='yellow fa-light fa-star-sharp fa-3x' data-bs-toggle='modal'></i></td></tr>";
                            }
                        }
                    }else{
                        for (let i = 0; i < votsuser.length; i++) {
                            if(votsuser[i].idobra == "table[tmp].idobra"){//comparar si la obra es del usuari actual esta votada
                                $(this).addClass("yellow fa-solid fa-star-sharp fa-3x");
                                // htm += "<tr><td scope='row'><h2>"+ table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+ table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+ table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+ table[tmp].idobra+"' name='"+ table[tmp].titolobra+"' class='yellow fa-solid fa-star-sharp fa-3x'></i></td></tr>";
                                fnd = true;
                                break;
                            }
                        }
                        if (!fnd){
                            $(this).addClass("yellow fa-light fa-star-sharp fa-3x").attr("data-bs-toggle","modal");
                            // htm += "<tr><td scope='row'><h2>"+table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='yellow fa-light fa-star-sharp fa-3x' data-bs-toggle='modal'></i></td></tr>";
                        }
                    }
                });
            } else{//no vots (no vots)
                table.forEach(element => {
                    if (element.idusuariautor == idusr){//votarse a si mateix
                        if (!selfvote){//votarse a si mateix (variable)
                            $(this).addClass("grey fa-solid fa-star-exclamation fa-3x");
                            // htm += "<tr><td scope='row'><h2>"+table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='grey fa-solid fa-star-exclamation fa-3x''></i></td></tr>";
                        }else{
                            $(this).addClass("yellow fa-light fa-star-sharp fa-3x").attr("data-bs-toggle","modal");
                            // htm += "<tr><td scope='row'><h2>"+table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='yellow fa-light fa-star-sharp fa-3x' data-bs-toggle='modal'></i></td></tr>";
                        }
                    }else{
                        $(this).addClass("yellow fa-light fa-star-sharp fa-3x").attr("data-bs-toggle","modal");
                        // htm += "<tr><td scope='row'><h2>"+table[tmp].titolobra+"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='' data-bs-toggle='modal'></i></td></tr>";
                    }
                });
            }
        });
    }
    $.showtab = function(num) {
        if (out == "#myobrestable"){// pagination from user artwork
            let tmp = num;
            let htm = "";
            if (maxnum > 0){
                htm += "<table class='table mb-5'><th class='col'><h2><b>Títol</b></h2></th><th class='col'><h2><b>Categoria</b></h2></th><th class='col'><h2><b>Obra</b></h2></th><th class='col'><h2><b>Accions</b></h2></th>";
                for (tmp; tmp != (num+5); tmp++) {
                    if (typeof table.data[tmp] !== 'undefined') {
                        htm += "<tr><td scope='row'><h2>"+table.data[tmp].titolobra+"</h2></td><td scope='row'><h2>"+table.data[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table.data[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table.data[tmp].idobra+"' name='"+table.data[tmp].titolobra+"' class='fa-regular fa-trash-can fa-3x' style='cursor: pointer;'></i></td></tr>";  
                    }
                }
                htm +="</table>";
            }else{
                htm += "<h2 class='offset-3 my-5'>Encara no tens cap obra publicada!</h2>";
            }
            $(out).html(htm);
        }else { // pagination from all user artworks (NOT WORKING)
            let htm = "";
            let votsuser = false;
            let idusr;
            let selfvote;
            if (maxnum > 0){
                htm += "<table class='table my-5'><th class='col'><h2><b>Títol</b></h2></th><th><h2 class='col'><b>Categoria</b></h2></th><th><h2 class='col'><b>Obra</b></h2></th><th><h2 class='col'><b>Vot</b></h2></th>";
                $.ajax({
                    data:  {"op": "votsusr"},
                    url:   'ajx/showobra.php',
                    type:  'post',
                    dataType: 'json',
                    async: false,
                    success:  function (response) {
                        // console.log(response);
                        votsuser = response.data;
                        idusr = response.idusr;
                        selfvote = response.selfvote;
                    }
                });
                for (let tmp = num; tmp != (num+5) && tmp < table.length; tmp++) {
                    htm += "<tr><td scope='row'><h2>"+ table[tmp].titolobra +"</h2></td><td class='tdTable'><h2>"+table[tmp].nomcategoria+"</h2></td><td class='tdTable'><a href='"+table[tmp].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><i id='"+table[tmp].idobra+"' name='"+table[tmp].titolobra+"' class='adclas'></i></td></tr>";
                }
                htm += "</table>";
                $(out).html(htm);
                $.clasad(votsuser,idusr,selfvote);
                // $.createVote();
            }else{
                htm = "<h2 class='offset-1 my-5'>Encara no hi ha cap obra publicada! <br>¡¡SIGUES EL PRIMER!!</h2>";
                $(out).html(htm);
            }
        }
    }

    $.selectPosition = function () {
        $("#adminTable tr td i.fa-square").click(function () {// admin number select
            if ($(this).hasClass("squareclk")){
                for (let c = 0; c < winers.length; c++) {
                    if ($(this).hasClass("fa-square-"+(c+1))){
                        $(this).removeClass("fa-solid fa-square-"+(c+1)+" squareclk").addClass("fa-light fa-square");
                        winers[c] = false;
                    }
                }
            }else{
                for (let c = 0; c < winers.length; c++) {
                    if (!winers[c]) {
                        $(this).removeClass("fa-light fa-square").addClass("fa-solid fa-square-"+(c+1)+" squareclk");
                        winers[c] = true;
                        return;
                    }
                }
            }
        });
    }
    // $(".fa-star-sharp").hover(function () {// vote (NOT WORKING)
    //     if (votar < 0){
        //         if ($(this).hasClass("grey")){
    //             $(this).css("cursor", "default");
    //         }else{
    //             $(this).css("cursor", "pointer;");
    //         }
    //     }
    // }
    // );
    // $.createVote = function() {// vote (NOT WORKING)
    //     $(".fa-light.fa-star-sharp").on("click", function () {
    //         // console.log(votar);
    //         if (votar > 0){
    //             obra = $(this).attr("id");
    //             if (!$(this).hasClass("grey")){
    //                 $("#titolmodal").text("Confirmació del vot a l'obra '"+ $("#"+obra).attr("name") + "'");
    //                 $("#modalVot").modal("show");
    //             }
    //         }
    //     });
    // }
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
        let response;
        $.ajax({
            data:  {"op": "obresxcat","idc": categ},
            url:   'ajx/showobra.php',
            type:  'post',
            dataType: 'json',
            async: false,
            success:  function (response) {
                if (!response) {
                    $(".tableadm").html('<h2 class="my-5 text-center"><span class="offset-2">No hi han Obres!!!</span></h2>');
                    return;
                }
                let htm = "<table class='table my-5' id='adminTable'><th class='col'><h2><b>Títol</b></h2></th><th><h2 class='col'><b>Obra</b></h2></th><th><h2 class='col'><b>Vots</b></h2></th><th><h2 class='col'><b>Podi</b></h2></th><th><h2 class='col'><b>Visible</b></h2></th>";
                for (let c = 0; c < response.data.length; c++) {
                    if (response.data[c].activa == 1) {
                        htm += "<tr><td scope='row'><h2>"+response.data[c].titolobra+"</h2></td><td class='tdTable'><a href='"+response.data[c].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><h2>"+response.data[c].vots+"</h2></td><td class='tdTable square'><i id='"+response.data[c].idobra+"' name='"+response.data[c].titolobra+"' class='fa-light fa-square fa-3x'></i></td><td class='tdTable'><i id='"+response.data[c].idobra+"' class='fa-solid fa-eye fa-3x'></i></td></tr>";
                    } else {
                        htm += "<tr><td scope='row'><h2>"+response.data[c].titolobra+"</h2></td><td class='tdTable'><a href='"+response.data[c].nomfitxer+"' target='_blank'><i class='red fa-light fa-file-pdf fa-3x''></i></a></td><td class='tdTable'><h2>"+response.data[c].vots+"</h2></td><td class='tdTable square'><i id='"+response.data[c].idobra+"' name='"+response.data[c].titolobra+"' class='fa-light fa-square fa-3x'></i></td><td class='tdTable'><i id='"+response.data[c].idobra+"' class='fa-solid fa-eye-slash fa-3x'></i></td></tr>";
                    }
                }
                htm += "</table>";
                $(".tableadm").html(htm);
                $.selectPosition();
                for (let c = 0; c < winers.length; c++) {
                     winers[c] = false;
                }
                $.disableObra();
            }
        });
    }
    $.showAdminTables($("select option:selected").val());
});