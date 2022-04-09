<?php
require_once("./incs/funcions.inc");
$error="";
if(recollirdades("daws") >=2 && recollirdades("daws")<=10){
    $daws = recollirdades("daws");
}else{
    $error = "No has introduit una quantitat de daus correcte!<br>";
}

if(recollirdades("color")==0){
    $error .= "No has seleccionat color!<br>";
}elseif (recollirdades("color")==1) {
    $color = 1;
}elseif (recollirdades("color")==2) {
    $color = 2;
}
$titol = recollirdades("tito");
$nombre = recollirdades("nomb");
$enllac = recollirdades("enll");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Pg.2</title>
</head>
<body>
    <?php
        if($error!=""){
            echo "<span style='color: red;'>".$error."</span>";
        }else{
            if($titol == "on"){
                echo "<h2>COMPTAR DAUS (RESULTAT)</h2>";
            }
            echo "<h3>".$daws." daus</h3>";
            for ($i=0; $i < $daws; $i++) { 
                $array["num"][$i]=rng(1,6);
                $array["col"][$i]=rng(1,2);
                echo '<img src="img/'.$array["num"][$i].'.svg" alt="'.$array["num"][$i].'" style="border: solid ';
                if($array["col"][$i]==1){
                    echo 'blue;">';
                    $blu++;
                }else {
                    echo 'red;">';
                    $red++;
                }
            }
            if($nombre == "on"){
                if($color==1){
                    echo "<br><h4>Tenim ".$blu." daus blaus</h4>";
                }else{
                    echo "<br><h4>Tenim ".$red." daus vermells</h4>";
                }
                colodaws($daws,$color,$array);
            }
            if($enllac == "on"){
                echo "<br><a href='index.html'>Tornar al formulari</a>";
            }
            echo '<form action="color.php" method="post">';
            if($color==1){
                echo '<input type="hidden" name="dawsb" value='.$blu.'>';
            }else{
                echo '<input type="hidden" name="dawsr" value='.$red.'>';
            }
            echo '<input type="hidden" name="daws" value='.$daws.'>';
            $ar = implode($array["num"],",");
            $arr = implode($array["col"],",");
            echo '<input type="hidden" name="array1" value='.$ar.'>';
            echo '<input type="hidden" name="array2" value='.$arr.'>';
            echo '<input type="submit" value="Seguent">';
            echo '</form>';
        }
    ?>
</body>
</html>