<?php
session_start();
require_once("../inc/constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
$sql = "SELECT idobra, idusuariautor, nomfitxer FROM "._TABLEOBRA." WHERE idusuariautor = ".$_SESSION["idusr"];
$res = $mysqli->query($sql);
while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
    if ($row["idobra"] == $_POST["idobra"]){
        $mysqli->query("DELETE FROM "._TABLEOBRA." WHERE idobra = ".$row["idobra"]);
        $mysqli->query("DELETE FROM "._TABLEVOTACIO." WHERE idobra = ".$row["idobra"]);
        unlink("../".$row["nomfitxer"]);
    }
}
echo "";