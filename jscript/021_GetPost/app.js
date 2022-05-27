'use strict';
$(function() {
    $("#form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            data:  {"name": $("#name").val(),"email": $("#email").val()},
            url:   'registre.php',
            type:  $("select option:selected").val(),
            dataType: 'json',
            async: true,
            success:  function (response) {
                console.log(response);
                $("#resposta").html(response.nom+"<br>"+response.mail);
            }
        });
    });
});