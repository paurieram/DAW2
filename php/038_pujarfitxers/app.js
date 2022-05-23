$(function () {
/**
 * When the button is clicked, hide all the elements, then show the element that corresponds to the button that
 * was clicked.
 */
    $("#b1").click(function() { 
        hid();
        $("#s1").show();
    });
    $("#b2").click(function() { 
        hid();
        $("#s2").show();
    });
    $("#b3").click(function() { 
        hid();
        $("#s3").show();
    });
    $("#b4").click(function() { 
        hid();
        $("#s4").show();
    });
    function hid() {
        $("#s1").hide();
        $("#s2").hide();
        $("#s3").hide();
        $("#s4").hide();
    }
    $.ajax({
        data:  {},
        url:   'soci.php',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            let html = "<select class='form-control' name='id'>";
                response.res.forEach(soci => {
                    html += "<option value='"+soci.idsoci+"'>"+soci.nomsoci+"</option>";
                });
            html += "</select>";
            $("#userdropdown").html(html);
        }
    });
    hid();
    $.ajax({
        data:  {},
        url:   'categ.php',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            let html = "<select class='form-control' name='id'>";
                response.res.forEach(categ => {
                    html += "<option value='"+categ.idprofessio+"'>"+categ.nomprofessio+"</option>";
                });
            html += "</select>";
            $("#catdropdown").html(html);
        }
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
    $.ajax({
        data:  {},
        url:   'llsocis.php',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            html="<table class='table'><th>idsoci</th><th>nomsoci</th><th>idprofessio</th><th>avatar</th>";
                response.res.forEach(soci => {
                    html += "<tr><td>"+soci.idsoci+"</td><td>"+soci.nomsoci+"</td><td>"+soci.idprofessio+"</td><td><a target='_blank' href="+soci.avatar+">img</td></tr>";
                });
            html+="</table>";
            $("#llistatsocis").html(html);
        }
    });
});