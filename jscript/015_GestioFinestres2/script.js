let windows = [];
let focused = 0;
$(document).ready(function () {
    $(".a, .b").click(function () { 
        if (!windows[0] != ""){
            create(0);
        }else if (!windows[1] != ""){
            create(1);
        }else{
            $("span").text(" No es poden obrir mes finestres!!");
        }
        function create(f){
            focused = f;
            windows[focused] = window.open("", "window"+focused, "width=250, height=250");
            windows[focused].document.write("<h3>Pagina "+(focused+1)+"</h3><h3 id='size'></h3><h3 id='pos'></h3>");
            setInterval(() => {
                windows[focused].document.getElementById("size").innerHTML = ''+windows[focused].outerWidth+' X '+windows[focused].outerHeight+'';
                windows[focused].document.getElementById("pos").innerHTML = ''+windows[focused].screenX+' X '+windows[focused].screenY+'';
            }, 100);
        }
    });
    $(".c, .d").click(function () { 
        if (focused == 0){
            focused = 1;
            windows[focused].focus();
        }else{
            focused = 0;
            windows[focused].focus();
        }
    });
    $(".e, .f, .g, .h").click(function () {
        windows[focused].moveBy($(this).attr("x"), $(this).attr("y"));
    });
    $(".i, .j").click(function () { 
        windows[focused].resizeBy($(this).attr("x"), $(this).attr("y"));
    });
    $(".m, .n").click(function () { 
        windows[$(this).attr("f")].close();
        windows[$(this).attr("f")] = "";
    });
});