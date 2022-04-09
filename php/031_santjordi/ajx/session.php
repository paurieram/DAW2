<?php
session_start();
require_once("../inc/constants.php");
$var["vots"] = $_SESSION['vots'];
$var["upl"] = $_SESSION['upl']; 
$var["acc"] = $_SESSION["acc"];
$var["win"] = _GUANYADORS;
echo json_encode($var);