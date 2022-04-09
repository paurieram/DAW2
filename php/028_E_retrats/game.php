<?php
session_start();
if (!isset($_SESSION["nomj"])){
    $_SESSION["nomj"]= isset($_POST["nom"])?$_POST["nom"]:"";
    $_SESSION["maxtirades"]= isset($_POST["maxtirades"])?$_POST["maxtirades"]:"";
    $_SESSION["tirades"]=1;
    $_SESSION["imatges"]=[rand(1,7),rand(1,7),rand(1,7)];
    $_SESSION["cares"]=0;
}else if (isset($_POST["canvi"])){
    $_SESSION["tirades"]+=1;
    if ($_SESSION["maxtirades"]<=$_SESSION["tirades"]){
        $_SESSION["end"]=true;
    }else{
        $_SESSION["imatges"][$_POST["canvi"]] = rand(1,7);
        if ($_SESSION["imatges"][0] == $_SESSION["imatges"][1] && $_SESSION["imatges"][1] == $_SESSION["imatges"][2]){
            $_SESSION["cares"] += 1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>028</title>
</head>
    <form action="game.php" method="post">
<body>
    <h1>Jugador: <?=$_SESSION["nomj"]?> amb <?=$_SESSION["tirades"]?>/<?=$_SESSION["maxtirades"]?> tirades restants</h1>
    <br><img src="imatgesactrius/retratos-<?=$_SESSION["imatges"][0]?>-3.jpg">
    <?php
        if ($_SESSION["end"]==false){
            echo '<button type="submit" name="canvi" value="0">Canvi ulls</button>';
        }
    ?><br><img src="imatgesactrius/retratos-<?=$_SESSION["imatges"][1]?>-2.jpg"><?php
        if ($_SESSION["end"]==false){
           echo '<button type="submit" name="canvi" value="1">Canvi nas</button>';
        }
    ?><br><img src="imatgesactrius/retratos-<?=$_SESSION["imatges"][2]?>-1.jpg"><?php
        if ($_SESSION["end"]==false){
            echo '<button type="submit" name="canvi" value="2">Canvi boca</button>';
        }
    if ($_SESSION["end"]==true){
       echo '<br><a href="results.php">Veure puntuacions</a>';
    }
    ?>
    </form>
</body>
</html>