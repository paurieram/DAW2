'use strict';
$(function() {
    $("#request").on("click", function(){
        $.ajax({
            url: 'data.php',
            success:  function (response) {
                $("#bio").html(response);
            }
        });
    });
});