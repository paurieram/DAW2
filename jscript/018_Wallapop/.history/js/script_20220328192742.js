$(document).ready(function() {
    $(".card").click(function() {
        $("#detallsWall").find(".row").remove();
        $(this).find(".row").clone().prependTo(".details");
        $("#detallsWall").modal("toggle");
    });
});