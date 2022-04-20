let window1;
let window2;
let focused;
$(document).ready(function () {
    $(document).click(function () { 
        let doc = focused.document;
        doc.getElementById("size").innerHTML = ''+focused.outerWidth+' X '+focused.outerHeight+'';
        doc.getElementById("pos").innerHTML = ''+focused.screenX+' X '+focused.screenY+'';
    });
    $(".a").click(function () { 
        window1 = window.open("", "window1", "width=250, height=250");
        window1.document.write("<h3>Pagina 1</h3>");
        window1.document.write("<h3 id='size'></h3>");
        window1.document.write("<h3 id='pos'></h3>");
        focused = window1;
    });
    $(".b").click(function () { 
        window2 = window.open("", "window2", "width=250, height=250");
        window2.document.write("<h3>Pagina 1</h3>");
        window2.document.write("<h3 id='size'></h3>");
        window2.document.write("<h3 id='pos'></h3>");
        focused = window2;
    });
    $(".c").click(function () { 
        window1.focus();
        focused = window1;
    });
    $(".d").click(function () { 
        window2.focus();
        focused = window2;
    });
    $(".e").click(function () { 
        focused.moveBy("-100", "0");
    });
    $(".f").click(function () { 
        focused.moveBy("0", "100");
    });
    $(".g").click(function () { 
        focused.moveBy("0", "-100");
    });
    $(".h").click(function () { 
        focused.moveBy("100", "0");
    });
    $(".i").click(function () { 
        focused.resizeBy("100", "100");
    });
    $(".j").click(function () { 
        focused.resizeBy("-100", "-100");
    });
    $(".m").click(function () { 
        window1.close();
    });
    $(".n").click(function () { 
        window2.close();
    });
});