const MAX_CATEG = 16;
const TIMEOUT = 10000;
let timeout=null;
$(document).ready(getdades(1));

function getdades(num){
    categoria = num;
    let params = {"num": num};
    $.ajax({
        data: params,
        url: "dadesbbdd.php",
        type: "post",
        dataType: "html",
        beforeSend: function(){
            $("#contenttable").html("procesant la informacio");
        },
        success: function(response){
            next();
            $("#contenttable").html(response);
        }
    })
}
function next() {
    if (timeout!=null){
        clearTimeout(timeout);
    }
    if (categoria >= MAX_CATEG){
        categoria=1;
    }else{
        categoria++;
    }
    timeout = setTimeout(() => {
        getdades(categoria);
    }, TIMEOUT);
}

