$(document).ready(function () {
    let theme = "white";
    var navpos = "open";
    let pag = "index";

    $("#bt").click(function() {
            if (theme == "white") {//white to dark
            $("#bt").removeClass("fa-sun");
            document.getElementById("bt").classList.add("fa-moon");
            $("body").addClass("bg-secondary");
            document.getElementById("1").classList.remove("bg-light");
            document.getElementById("1").classList.add("text-white");
            document.getElementById("1").classList.add("bg-dark");
            document.getElementById("2").classList.remove("link-dark");
            document.getElementById("2").classList.add("text-white");
            document.getElementById("3").classList.remove("link-dark");
            document.getElementById("3").classList.add("text-white");
            document.getElementById("4").classList.remove("link-dark");
            document.getElementById("4").classList.add("text-white");
            // document.getElementById("5").classList.remove("link-dark");
            // document.getElementById("5").classList.add("text-white");
            // document.getElementById("6").classList.remove("link-dark");
            // document.getElementById("6").classList.add("text-white");
            // document.getElementById("0").src = "img/logo_d.png";
            // document.getElementById("02").classList.remove("link-dark");
            // document.getElementById("02").classList.add("text-white");
            theme = "dark";
        } else if (theme == "dark") {//dark to white
            $("#bt").removeClass("fa-moon").addClass("fa-sun");
            $("body").removeClass("bg-secondary");
            $("#1").removeClass("bg-dark").removeClass("text-white").addClass("bg-light");
            document.getElementById("2").classList.remove("text-white");
            document.getElementById("2").classList.add("link-dark");
            document.getElementById("3").classList.remove("text-white");
            document.getElementById("3").classList.add("link-dark");
            document.getElementById("4").classList.remove("text-white");
            document.getElementById("4").classList.add("link-dark");
            // document.getElementById("5").classList.remove("text-white");
            // document.getElementById("5").classList.add("link-dark");
            // document.getElementById("6").classList.remove("text-white");
            // document.getElementById("6").classList.add("link-dark");
            // document.getElementById("0").src = "img/logo.png";
            // document.getElementById("02").classList.remove("text-white");
            // document.getElementById("02").classList.add("link-dark");
            theme = "white";
        };
    });

    $("#7").click(function() { 
        if (navpos == "open") {//open to close
            document.getElementById("1").style.width = "0%";
            document.getElementById("7").style.marginLeft = "1%";
            document.getElementById("2").style.display = "none";
            document.getElementById("3").style.display = "none";
            document.getElementById("4").style.display = "none";
            // document.getElementById("5").style.display = "none";
            // document.getElementById("6").style.display = "none";
            // document.getElementById("0").style.display = "none";
            document.getElementById("1").style.display = "none";
            document.getElementById("bt").style.display = "none";
            if (theme == "white") {
                document.getElementById("1").classList.remove("bg-light");
            } else if (theme == "dark") {
                document.getElementById("1").classList.remove("bg-dark");
            };
            navpos = "closed";
        } else if (navpos == "closed") {//close to open
            document.getElementById("1").style.width = "20%";
            document.getElementById("7").style.marginLeft = "21%";
            document.getElementById("2").style.display = "block";
            document.getElementById("3").style.display = "block";
            document.getElementById("4").style.display = "block";
            // document.getElementById("5").style.display = "block";
            // document.getElementById("6").style.display = "block";
            // document.getElementById("0").style.display = "block";
            document.getElementById("1").style.display = "block";
            document.getElementById("bt").style.display = "block";
            navpos = "open";
            if (theme == "white") {
                document.getElementById("1").classList.add("bg-light");
            } else if (theme == "dark") {
                document.getElementById("1").classList.add("bg-dark");
            };
        };
    });

    function page(p){
        pag=p;
    }
    $.deletespam = function(){
        $("div[style='text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;']").remove();
        $(".disclaimer").hide();
    }
    window.setInterval($.deletespam(),5000);
});