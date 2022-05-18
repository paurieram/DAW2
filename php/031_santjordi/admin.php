<?php
session_start();
require_once("inc/constants.php");
if ($_SESSION["log"] == "ADMIN") {
?>
    <!DOCTYPE html>
    <html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="lib/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="lib/bootstrap.min.css">
        <script src="lib/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
        <link rel="icon" type="image/x-icon" href="https://www.ginebro.cat/favicon.ico">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <script src="admin.js"></script>
        <title>Ginebró | Sant Jordi | Admin</title>
    </head>

    <body class="greenyellow">
        <div style="height: 40px;" class="greenyellow"></div>
        <div class="mb-4" style="flex: 1 0 auto;">
        <!-- nav -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light pe-4">
                <div class="container-fluid">
                    <a class="navbar-brand" target="_blank" href="https://www.ginebro.cat/"><img id="logo" src="img/ginebro-logo.png" alt="ginebro-logo"></a>
                    <div class="dropdown">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hola admin!
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="redirect/logout.php">Sortir</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- admin table artworks -->
            <div class="container pt-5">
                <div class="offset-1 col-10 containerMenu">
                    <div class="row">
                        <button num="0" id="publicar" class="col btn btn-outline-danger text-dark p-0 my-5 ms-5" data-bs-toggle="modal">Publicar</button>
                        <h1 class="my-5 text-center col-6"><b>Obres Publicades</b></h1>
                        <div class="col float-end my-5 me-5">
                            <select class="form-select" name="categ" id="adm" aria-label="Floating label select example">
                                <?php
                                $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                                $sql = "SELECT * FROM " . _TABLECATEGORIES . " ";
                                $res = $mysqli->query($sql);
                                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                    echo ("<option value='" . $row["idcategoria"] . "'>" . $row["nomcategoria"] . "</option>");
                                }
                                ?>
                            </select>
                            <label for="floatingSelectGrid">Selecciona la categoría</label>
                        </div>
                    </div>
                    <div class="offset-1 col-10 tableadm"></div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="container-fluid p-4">
            <div class="row">
                <div class="col-6 offset-3 ftrtxt">Desenvolupat per <a href="https://github.com/paurigine" target="_blank" style="color:green; text-decoration: none;">Pau Riera</a> i <a href="https://github.com/rubegine" target="_blank" style="color:green; text-decoration: none;">Ruben Recolons</a>, alumnes de 2n DAW</div>
                <ul class="social-footer-icons col-3">
                    <li><a href="https://www.ginebro.cat/blog/" target="blank"><i class="fa-solid fa-blog" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/escolaginebro/" target="blank"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/escolaginebro" target="blank"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/escolaginebro" target="blank"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </footer>
        <!-- Modal -->
    <div class="modal fade" id="modalpubli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b id="titolm"></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="h5" id="mbody"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success confirmarPbl" data-bs-dismiss="modal">Confirma</button>
                </div>
            </div>
        </div>
    </div>
    </html>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>