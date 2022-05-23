<?php
session_start();
require_once("constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

$sql = "SELECT * FROM "._TABLESOCIS;
$res = $mysqli->query($sql);
while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $JSON["res"][] = $row;
}
echo json_encode($JSON);