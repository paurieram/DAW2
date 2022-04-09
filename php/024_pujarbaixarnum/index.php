<?php
    session_start();
?>
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
        $comptador=isset($_SESSION["comptador"])?$_SESSION["comptador"]:0;
        $comptador=intval($comptador);
    ?> 
    <form action="gestiona.php" method="post">
        <button type="submit" value="baixar" name="accio" style="font-size:50px;">-</button>
        <span style="font-size:60px;"><?=$comptador?></span>
        <button type="submit" value="pujar" name="accio" style="font-size:50px;">+</button><br>
        <button type="submit" value="borrar" name="accio" style="font-size:50px;">D</button>
    </form>
</body>
</html>