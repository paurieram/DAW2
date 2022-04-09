<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>017</title>
</head>
<body>
    <?php
    require("./incs/funcions.inc");
    $ata=rand(1,3);
    $def=rand(1,2);
    $array[0]=rng($ata);
    $array[1]=rng($def);
    rsort($array[0]);
    rsort($array[1]);
    $arrayres=res($array);
    echo "<h1>Atacant</h1>";
    echo "<p>L'atacant ataca amb ".$ata." daus:</p>";
    for ($i=0; $i < $ata; $i++) { 
        echo '<img src="./img/'.$array[0][$i].'.svg" alt='.$array[0][$i].'.svg>';
    }
    echo "<h1>Defensor</h1>";
    echo "<p>El defensor defensa amb ".$def." daus:</p>";
    for ($i=0; $i < $def; $i++) { 
        echo '<img src="./img/'.$array[1][$i].'.svg" alt='.$array[1][$i].'.svg>';
    }
    echo "<h1>Resultat</h1>";
    show($arrayres[0],$arrayres[1]);
    ?>
</body>
</html>