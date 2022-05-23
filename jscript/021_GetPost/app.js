'use strict';
$(function() {
    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            data:  {},
            url:   'registre.php',
            type:  $("select option:selected").val(),
            dataType: 'json',
            async: true,
            success:  function (response) {
                console.log(response);
                alert("asd");
                $("#resposta").text(response.text);
            }
        });
    });
});