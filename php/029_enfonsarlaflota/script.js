$(document).ready(function () {
    let baix = $("#nomb").text().split(": ");
    if (baix[1]=="portaavions"){
        baix = 4;
    }else if (baix[1]=="cuirassats"){
        baix = 3;
    }else if (baix[1]=="destructors"){
        baix = 2;
    }else{
        baix = 0;
    }
    $("#place").on("submit",function(e) {
        if ($("#Xi").val() == ""){
            $("#Xi").focus();
            $("#error").text("X inicial buida!");
        }else if ($("#Yi").val() == ""){
            $("#Yi").focus();
            $("#error").text("Y inicial buida!");
        }else if ($("#Xf").val() == ""){
            $("#Xf").focus();
            $("#error").text("X inicial buida!");
        }else if ($("#Yf").val() == ""){
            $("#Yf").focus();
            $("#error").text("Y inicial buida!");
        }else if ($("#Xi").val() != $("#Xf").val() && $("#Yi").val() != $("#Yf").val()){
            $("#Xf").focus();
            $("#error").text("No es poden ficar barcos en diagonal!");
        }else{
            if (($("#Xi").val() - $("#Xf").val()) < 0){
                if ($("#Xi").val() - $("#Xf").val() == -baix){
                    return;
                }else{
                    $("#Xf").focus();
                    $("#error").text("Error el tamany del baixell es incorrecte!");
                }
            }else if (($("#Xi").val() - $("#Xf").val()) > 0){
                if ($("#Xi").val() - $("#Xf").val() == baix){
                    return;
                }else{
                    $("#Xf").focus();
                    $("#error").text("Error el tamany del baixell es incorrecte!");
                }
            }
            if (($("#Yi").val() - $("#Yf").val()) < 0){
                if ($("#Yi").val() - $("#Yf").val() == -baix){
                    return;
                }else{
                    $("#Yf").focus();
                    $("#error").text("Error el tamany del baixell es incorrecte!");
                }
            }else if (($("#Yi").val() - $("#Yf").val()) > 0){
                if ($("#Yi").val() - $("#Yf").val() == baix){
                    return;
                }else{
                    $("#Yf").focus();
                    $("#error").text("Error el tamany del baixell es incorrecte!");
                }
            }
        }
        e.preventDefault();
        e.stopPropagation();
    });
    // if ($("#Xi").val()+""+$("#Yi").val()){

    // }
});