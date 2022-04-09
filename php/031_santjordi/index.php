<?php
session_start();
unset($_SESSION["usr"]);
unset($_SESSION["log"]);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
        <script src="lib/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="lib/bootstrap.min.css">
        <script src="lib/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
        <link rel="icon" type="image/x-icon" href="https://www.ginebro.cat/favicon.ico">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <title>Ginebró | Sant Jordi</title>
</head>
<body class="greenyellow d-flex flex-column min-vh-100" style="overflow-x: hidden;">
    <!-- Menu de Navegació -->
    <div style="height: 40px;" class="greenyellow"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" target="_blank" href="https://www.ginebro.cat/"><img id="logo" src="img/ginebro-logo.png" alt="ginebro-logo"></a>
        </div>
    </nav>
    <div class="container forn">
        <!-- Form login -->
        <div class="row" id="loginForm">
            <img src="img/sant-jordi.png" alt="sant-jordi" class="col-4 display">
            <form class="bg-white rounded col-md-9 col-lg-4 col-12 offset-1 mt-5 mb-5 ps-5 pe-5 formLogin" action="redirect/login.php" method="POST">
                <div class="mb-3">
                    <b><label for="Usuari" class="form-label mt-1">Usuari</label></b>
                    <input type="email" class="form-control" id="Usuari" name="usr" placeholder="Usuari" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <b><label for="Contrasenya" class="form-label">Contrasenya</label></b>
                    <input type="password" class="form-control" name="pas" id="Contrasenya" placeholder="Contrasenya">
                </div>
                <div class="mb-3 p-1 form-check">
                    <a class="forgotPass" href="#">No recordo la contrasenya</a>
                </div>
                <span id="spanLogin" style="color: <?=$_SESSION["col"]?>; margin-left: 1%;"><?=$_SESSION["err"]?></span>
                <input type="submit" id="btnEnviar" value="Entrar" style="float: right;" class="btn greenyellow btnsmt">
            </form>
        </div>
        <!-- Form oblidat contrasenya -->
        <div class="row" id="forgotForm" style="display: none">
            <img src="img/sant-jordi.png" alt="sant-jordi" class="col-4 display">
            <form class="bg-white rounded col-md-9 col-lg-4 col-12 offset-1 mt-5 mb-5 ps-5 pe-5 formLogin" id="formform" method="post" action="redirect/send.php">
                <div class="mb-3 mt-5">
                    <b><label for="forgetEmail" class="form-label" style="margin-top: 10%;">Escriu el teu correu electrònic</label></b>
                    <input type="email" class="form-control" id="forgetEmail" name="forgetEmail" placeholder="Correu electrònic" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 form-check p-0">
                    <a class="forgotPass" href="#">Torna enrere</a>
                    <input type="submit" id="forgotBtn" value="Enviar" class="btn greenyellow btnsmt" style="float: right;" value>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer class="container-fluid p-4 mt-auto">
            <div class="row">
                <div id="links" class="col-6 offset-3 ftrtxt">Desenvolupat per <a href="https://github.com/paurigine" target="_blank" style="color:green; text-decoration: none;">Pau Riera</a> i <a href="https://github.com/rubegine" target="_blank" style="color:green; text-decoration: none;">Ruben Recolons</a>, alumnes de 2n DAW</div>
                <ul class="social-footer-icons col-3">
                    <li><a href="https://www.ginebro.cat/blog/" target="blank"><i class="fa-solid fa-blog" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/escolaginebro/" target="blank"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/escolaginebro" target="blank"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/escolaginebro" target="blank"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li> 
                </ul>
            </div>
        </footer> 
    <?php
        unset($_SESSION["err"]);
        unset($_SESSION["col"]);
    ?>
</body>

</html>