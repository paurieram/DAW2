<?php    // echo "<script>console.log('" . json_encode($row) . "' );</script>";
session_start();
require_once("inc/constants.php");
if ($_SESSION["log"] == "USER") {
    $_SESSION["acc"]=$_GET['acc'];
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
        <title>Ginebró | Sant Jordi</title>
    </head>
    <img src='img/sant-jordi.png' id="bgi" alt="">
    <!-- <div id="bgi"></div> -->
    <body class="greenyellow">
        <!-- Barra de Navegació -->
        
        <div style="height: 20px;" class="greenyellow"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="row" style="width: 100%">
                    <a class="navbar-brand col-3" target="_blank" href="https://www.ginebro.cat/"><img id="logo" src="img/ginebro-logo.png" alt="ginebro-logo"></a>
                    <div class="dropdown col-1">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            hola <?= $_SESSION["usr"] ?>!
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php if (_VOTE){ ?>
                            <a class="dropdown-item vot">Votar obres</a>
                        <?php } ?>
                            <a class="dropdown-item new">Pujar obra</a>
                            <a class="dropdown-item" href="redirect/logout.php">Sortir</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Menu Principal -->
        <div class="container mt-5 pt-5 col-12" id="botonsAmagats">
            <?php if (_VOTE){ ?>
            <div class="row offset-1 mt-5 pt-5 col-6" style="width: 100%; height: 100%;">
                <button id="btnvote" style="width: 500px; height: 300px;" class="vot btn bg-white">
                    <span class="fa-duotone fa-check-to-slot fa-5x"></span>
                    <h1><b>Votar obres</b></h1>
                </button>
                <button id="btnupload" style="width: 500px; height: 300px;" class="new btn bg-white offset-1">
                    <span class="fa-solid fa-file-arrow-up fa-5x"></span>
                    <h1><b>Pujar obra</b></h1>
                </button>
            </div> 
            <?php } else { ?>
            <div class="row mt-5 pt-5 col-6 d-flex justify-content-center" style="width: 100%; height: 100%;">
                <button id="btnupload" style="width: 500px; height: 300px;" class="new btn bg-white">
                    <span class="fa-solid fa-file-arrow-up fa-5x"></span>
                    <h1><b>Pujar obra</b></h1>
                </button>
            </div> 
            <?php } ?>
        </div>
        <!-- Menu Pujar Obra -->
        <div class="container py-5 my-5" id="pujarObra" style="display: none;">
            <div class="offset-1 col-10 mt-5 containerMenu">
                <div class="offset-1 col-10">
                    <h1 class="mt-4 text-center"><b>Pujar obra</b></h1>
                    <?php
                        if($_SESSION['upl'] == 0){
                            echo '<h2 class="mt-5 text-center"><b>Gracies per participar!!!</b></h2><h3 class="text-center">Ja has penjat les teves obres.</h3><div class="container d-flex justify-content-end"><button class="btn btn-outline-dark mb-5 col-2 tornar">Tornar</button></div>';
                        }else{
                    ?>
                    <form class="mt-3" action="redirect/upload.php" method="post" enctype="multipart/form-data">
                        <div class="row g-2 mt-3">
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="nom" id="floatingInputGrid" placeholder="" required>
                              <label for="floatingInputGrid">Nom de l'obra</label>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-floating">
                              <select class="form-select" name="categ" id="floatingSelectGrid" aria-label="Floating label select example">
                                <?php
                                    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                                    $sql = "SELECT * FROM "._TABLECATEGORIES." ";
                                    $res = $mysqli->query($sql);
                                    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                                        echo ("<option value='".$row["idcategoria"]."'>".$row["nomcategoria"]."</option>");
                                    }
                                ?>
                              </select>
                              <label for="floatingSelectGrid">Selecciona la categoría</label>
                            </div>
                          </div>
                        </div>
                        <div class="mb-4 mt-3">
                          <label for="formFile" class="form-label">Selecciona el fitxer <b>pdf</b></label>
                          <input class="form-control" name="pdf" type="file" id="formFile">
                        </div>
                        <div class="container p-0">
                            <div class="row">
                                <div id="spanLogin" class="alert <?=$_SESSION["col"]?> col-6" role="alert" style="left: 12px;">
                                    <div><?=$_SESSION["err"]?></div>
                                </div>
                                <div class=" d-md-flex justify-content-md-end col-6 ">
                                    <button type="submit" class="btn btn-outline-dark mb-4 col-8">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="container p-0 h-50">
                        <button class="btn btn-outline-dark mb-4 col-md-auto menuObres mx-2 h-50">Veure obres</button>
                        <button class="btn btn-outline-dark mb-4 col-md-auto tornarmenu" style="float: right;">Tornar</button>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Menu Votar Obra -->
        <div class="container py-5" id="votarObra" style="display: none;">
            <div class="offset-1 col-10 containerMenu">
                <div class="offset-1 col-10">
                    <h1 class="mt-4 text-center"><b>Votar obra</b></h1>
                    <section class="container">
                        <div class="row">
                            <div class="p-0">
                                <a id="v1" class="btn btn-outline-secondary offset-9"><i class="fas fa-angle-double-left"></i></a>
                                <a id="v2" class="btn btn-outline-secondary"><i class="fas fa-angle-left"></i></a>
                                <a id="v3" class="btn btn-outline-secondary"><i class="fas fa-angle-right"></i></a>
                                <a id="v4" class="btn btn-outline-secondary"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div id="obrestable"></div>
                        </div>
                    </section>
                    <div class="container d-flex justify-content-end"><button class="btn btn-outline-dark mb-5 col-auto tornarmenu">Tornar</button></div>
                </div>
            </div>
        </div>
        <!-- Menu Obres Propies -->
        <div class="container pt-5 mb-5" id="ownObres" style="display: none; margin-bottom: 10% !important">
            <div class="offset-1 col-10 containerMenu">
                <div class="offset-1 col-10">
                    <h1 class="mt-4 text-center"><b>Les meves obres</b></h1>
                    <section class="container">
                        <div class="row">
                            <div class="p-0">
                                <a id="o1" class="btn btn-outline-secondary offset-9"><i class="fas fa-angle-double-left"></i></a>
                                <a id="o2" class="btn btn-outline-secondary"><i class="fas fa-angle-left"></i></a>
                                <a id="o3" class="btn btn-outline-secondary"><i class="fas fa-angle-right"></i></a>
                                <a id="o4" class="btn btn-outline-secondary"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                            <div id="myobrestable"></div>
                        </div>
                    </section>
                    <div class="container d-flex justify-content-end"><button class="btn btn-outline-dark mb-5 col-auto tornarpujar">Tornar</button></div>
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
    </body>
    <!-- Modal -->
    <div class="modal fade" id="modalVot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b id="titolmodal"></b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success confirmarBot" data-bs-dismiss="modal">Confirma</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b id="titolmodal2"></b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success confirmarDel" data-bs-dismiss="modal">Confirma</button>
        </div>
        </div>
    </div>
    </div>
    </html>
<?php
unset($_SESSION["err"]);
unset($_SESSION["col"]);
} else {
    header("Location: index.php");
}
?>