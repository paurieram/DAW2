<?php
session_start();
$comptador = isset($_SESSION["comptador"])?$_SESSION["comptador"]:0;
$accio = isset($_POST["accio"])?$_POST["accio"]:"";
if ($accio==""){
    echo "Error en la conexio amb el formulari";
    exit();
}elseif ($accio=="borrar") {
    unset($_SESSION["comptador"]);
} else{
    if ($accio=="pujar"){
        if($_SESSION["comptador"]>=50){
            $comptador=0;
        }else {
            $comptador = $comptador+1;
        }
    } elseif ($accio=="baixar") {
        if($_SESSION["comptador"]<=0){
            $comptador=50;
        }else {
            $comptador=$comptador-1;
        }
    }
    $_SESSION["comptador"]=$comptador;
}
header("location:index.php")
?>