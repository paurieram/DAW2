<?php
require_once("./inc/functions.inc");
$nom = recollirdades("nom");
$cognom = recollirdades("cognom");
$edat = recollirdades("edat");
$aficions = recollirdades("aficions");
$pes = recollirdades("pes");
$sexe = recollirdades("sexe");
$religioc = recollirdades("cristia");
$religiom = recollirdades("musulma");
$religioj = recollirdades("jueva");
$religioa = recollirdades("altres");
$error="";
if ($nom ==""){
    $error = "-Falta el nom <br>";
}
if($cognom==""){
    $error .= "-Falta el cognom <br>";
}
if($edat=="0"){
    $error .= "-Falta la edat <br>";
}elseif (!is_numeric($pes)) {
    $error .= "-Has introduit lletres a la edat <br>";
}
if($aficions=="0"){
    $error .= "-Falta seleccionar les aficions <br>";
}
if($pes==""){
    $error .= "-Falta el pes <br>";
}
if($sexe==""){
    $error .= "-Falta el sexe <br>";
}
if($religioc=="" && $religiom=="" && $religioj=="" && $religioa==""){
    $error .= "-Falta la religio <br>";
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>018</title>
</head>
<body>
    <?php
    if($error!=""){
        echo "<span style='color: red;'>".$error."</span>";
    }else{
        echo "El teu nom es ".$nom."<br>";
        echo "El teu cognom es ".$cognom."<br>";
        if($edat==1){
            echo "La teva edat és menys de 20 anys<br>";
        }elseif($edat==2){
            echo "La teva edat és entre 20 i 39 anys<br>";
        }elseif ($edat==3) {
            echo "La teva edat és entre 40 i 59 anys<br>";
        }else {
            echo "La teva edat és 60 anys o mes<br>";
        }
        if($aficions==1){
            echo "La teva afició és Videojocs<br>";
        }elseif($aficions==2){
            echo "La teva afició és Futbol<br>";
        }elseif ($aficions==3) {
            echo "La teva afició és Estudiar<br>";
        }else {
            echo "La teva afició és Altres<br>";
        }
        echo "El pes es ".$pes."<br>";
        echo "El teu sexe es ".$sexe."<br>";
        if($religioc=="cristia"){
            echo "La teva religió és Cristià<br>";
        }elseif($religiom=="musulma"){
            echo "La teva religió és Musulmà<br>";
        }elseif ($religioj=="jueva") {
            echo "La teva religió és jueva<br>";
        }elseif ($religioj=="altres") {
            echo "La teva religió és Altres<br>";
        }
    }
    ?>
</body>
</html>