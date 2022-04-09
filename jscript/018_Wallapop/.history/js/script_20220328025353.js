$(document).ready(function() {
    $(".cells").click(function() {
        $("#detallsWall").find(".row").remove();
        $(this).find(".row").clone().prependTo(".details");
        $("#detallsWall").modal("toggle");
    });
});