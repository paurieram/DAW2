<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $comptador = isset($_SESSION["comptador"])?$_SESSION["comptador"]:0;
        echo "<h1>sesio es $comptador</h1>";
        $comptador = $comptador+1;
        $_SESSION["comptador"]=$comptador;
    ?>
    <a href="tancarsesio.php">tancar sesio</a>
</body>
</html>