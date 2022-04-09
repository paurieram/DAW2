<?php
function recollirdades($nomcamp){
    return isset($_POST[$nomcamp])?$_POST[$nomcamp]:0;
}
// index.html
$jugador = recollirdades("nom");
$tiradesmax = recollirdades("tiradesi");
$tirades = 0;
if($tirades!=0 and $tirades<=$tiradesmax){
    $tirades++;
}

//index.php
if ($tiradesmax==""){
    $tiradesmax = recollirdades("maxtirades");
}
$tidades_text = " ".$tirades." / ".$tiradesmax;
$card = recollirdades("card");
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
    <form action="index.php" method="post">
        <label>Jugador: </label><span><?=$jugador?></span>
        <input type="hidden" name="nom" value="<?=$jugador?>">
        <br>
        <?php
            echo "<label>Tirades:</label><span>$tidades_text</span>";
        ?>
        <input type="hidden" name="tirades" value="<?=$tirades?>">
        <input type="hidden" name="maxtirades" value="<?=$tiradesmax?>">
        <br>
        <?php
            if($tirades < $tiradesmax){
                echo '<button type="submit" name="card" value="1" ><img src="img/card.jpg"></button>';
                echo '<button type="submit" name="card" value="2" ><img src="img/card.jpg"></button>';
                echo '<button type="submit" name="card" value="3" ><img src="img/card.jpg"></button>';
            }else{
                echo '<a href="index.html">tornar al inici</a>';
            }
            if isset($card){
                $rng = rand(1,3)
                if($rng==$card){
                    echo '<br><div>Has encertat!</div>';
                }else{
                    echo '<br><div>No has encertat</div>';
                }
            }
        ?>
    </form>
</body>
</html>