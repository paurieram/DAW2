<?php
session_start();
$_SESSION["tirada"]=0;
$_SESSION["j1p"]=0;
$_SESSION["j2p"]=0;
$_SESSION["empats"]=0;
$_SESSION["win"]="";
header('Location: getdades.php');
?>