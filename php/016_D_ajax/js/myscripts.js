function cridaAjax(){
    var parametres = {
            "param1" : "VALOR1",
            "param2" : "VALOR2"
    };
    $.ajax({
            data:  parametres,
            url:   'getinfo.php',
            type:  'post',
            dataType: 'html', 
            beforeSend: function () {
                    $("#resultat").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                    $("#resultat").html(response);
            }
    });
}

function getalumnes(grup){
    var parametres2 = {
        "valgr" : grup
    };
    $.ajax({
        data:  parametres2,
        url:   'getalumnes.php',
        type:  'post',
        dataType: 'html', 
        beforeSend: function () {
                $("#contentable").html("Procesando, espere por favor...");
        },
        success:  function (response) {
                $("#contentable").html(response);
        }
});
}