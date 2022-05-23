<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
    <script src="app.js"></script>
    <title>038</title>
</head>
<?php
session_start();
?>
<body>
    <button id="b1" class="btn btn-secondary">Pujar Avatar</button>
    <button id="b2" class="btn btn-secondary">Pujar Imatge</button>
    <button id="b3" class="btn btn-secondary">Mostrar llista socis</button>
    <button id="b4" class="btn btn-secondary">Mostrar galeria imatges professió</button>
    <span id="err" class='<?=$_SESSION["c"]?>'><?=$_SESSION["o"]?></span>
    <?php
    unset($_SESSION["c"]);
    unset($_SESSION["o"]);
    ?>
    <hr class="mb-5">
    <section id="s1" class="container">
        <form id="ia" action="upload.php" method="post" class="row col-6 offset-3" enctype="multipart/form-data">
            <label for="img">Selecciona Soci</label>
            <div id="userdropdown" class="p-0"></div>
            <label for="img">Selecciona Avatar</label>
            <input type="file" name="imga" class="form-control">
            <input type="submit" value="Pujar" class="btn btn-secondary col-2 offset-10">
        </form>
    </section>
    <section id="s2" class="container">
        <form id="ii" action="upload.php" method="post" class="row col-6 offset-3" enctype="multipart/form-data">
            <label for="img">Selecciona Categoria</label>
            <div id="catdropdown" class="p-0"></div>
            <label for="img">Selecciona Imatge</label>
            <input type="file" name="imgi" class="form-control">
            <input type="submit" value="Pujar" class="btn btn-secondary col-2 offset-10">
        </form>
    </section>
    <section id="s3" class="container">
        <div class="row">
            <div id="llistatsocis"></div>
        </div>
        <table id="content" class="table">
        </table>
        </div>
    </section>
    <section id="s4">

    </section>
    
</body>
</html>






