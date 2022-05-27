$(function () {
    $("#comunitats").on("change", function () {
        provincies();
    });
    $.ajax({
        type: "post",
        url: "json/comunidades.json",
        dataType: "json",
        success: function (response) {
            let html = "";
            response.forEach(comunidad => {
                html += "<option value='"+comunidad.codigo+"'>"+comunidad.nombre+"</option>";
            });
            $("#comunitats").html(html);
            provincies();
        }
    });
    function provincies() {
        $.ajax({
            type: "post",
            url: "json/"+$("#comunitats option:selected").val()+".json",
            dataType: "json",
            success: function (response) {
                let html = "";
                response.forEach(provincia => {
                    html += "<option>"+provincia+"</option>";
                });
                $("#provincies").html(html);
            }
        });
    }
});