$(document).ready(function () {
    let num = 0;
    let maxnum = 0;
    $.ajax({
        data:  {"op": 0},
        url:   'inc/getregistres.php',
        type:  'post',
        dataType: 'html',
        success:  function (response) {
            maxnum = response;
        }
    });
    $("#1").hide();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#0").click(function () { 
        $("#0").hide();
        $("#1").show();
        $("#2").show();
        $("#3").show();
        $("#4").show();
        $.ajx(0,1);
    });
    $("#1").click(function () { 
        num=0;
        $.ajx(num,1);
    });
    $("#2").click(function () { 
        if (num-5 >= 0){
            num-=5;
            $.ajx(num,1);
        }
    });
    $("#3").click(function () { 
        if (num+5 < maxnum){
            num+=5;
            $.ajx(num,1);
        }
    });
    $("#4").click(function () { 
        num=maxnum-(maxnum%5);
        $.ajx(num,1);
    });
    $.ajx = function(n, o){
        $.ajax({
            data:  {"num": n, "op": o},
            url:   'inc/getregistres.php',
            type:  'post',
            dataType: 'html',
            success:  function (response) {
                $("#content").html(response);
            }
        });
    }
});