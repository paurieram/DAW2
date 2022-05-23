<?php
session_start();
require_once("constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

$sql = "SELECT nomsoci, idsoci FROM "._TABLESOCIS." WHERE avatar IS NULL";
$res = $mysqli->query($sql);
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $JSON["res"][] = $row;
}
echo json_encode($JSON);