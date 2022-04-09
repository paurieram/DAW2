function getSoci(){
    $.ajax({
        data: {"soci":$("#soci").val()},
        url: 'request.php',
        type: 'post',
        dataType: 'json', 
        beforeSend: function () {
            $("#content").html("...");
        },
        success:  function (response) {
            if (typeof response.data.nomusuari !== 'undefined'){
                $("#content").html(response.data.nomusuari + " " + response.data.cognomusuari);
            }else{
                $("#content").html(response.message);
            }
        },
        fail: function () {
            $("#content").html("Err");
        }
});
}