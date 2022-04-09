<?php
require_once("../inc/constant.inc");
session_start();
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
$sql = "UPDATE "._TABLEPARTIDES." SET puntuacio = 0 WHERE idusuari = ".$_SESSION["usrid"].";";
$res = $mysqli->query($sql);
header("Location: ../index.php");
exit();