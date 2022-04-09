<?php
$nom = isset($_POST["nom"])?$_POST["nom"]:$_GET["nom"];
$cognom = isset($_POST["cognom"])?$_POST["cognom"]:$_GET["cognom"];

$elfitxer = fopen("files/fitxer.txt","a");
if(!$elfitxer){
    header("location:recive.php?resultat=KO");
}else{
    $liniatxt = "Nom: ".$nom."- Cognom: ".$cognom."\n";
    fwrite($elfitxer,$liniatxt);
    fclose($elfitxer);
    header("location:recive.php?resultat=OK");
}

?>