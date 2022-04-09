function getdades(grup){
    let params = {"grp": grup};
    $.ajax({
        data: params,
        url: "getdades.php",
        type: "post",
        dataType: "html",
        beforeSend: function(){
            $("#contenttable").html("procesant la informacio");
        },
        success: function(response){
            $("#contenttable").html(response);
        }
    })

}