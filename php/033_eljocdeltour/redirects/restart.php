<?php 

session_start();
unset($_SESSION["err"]);
unset($_SESSION["img"]);
$_SESSION["pts"] = 0;
$_SESSION["try"] = 0;
header("Location: ../partida.php");

?>