<?php
session_start();
require_once("../inc/constants.php");
if (isset($_POST["idobra"])){
    if($_SESSION['vots']>0){
        $_SESSION['vots']-=1;
        $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
        $sql = "INSERT INTO "._TABLEVOTACIO." (idusuari, idobra) VALUES (".$_SESSION["idusr"].", ".$_POST['idobra'].")";
        $mysqli->query($sql);
    }
    echo "";
}else{
   echo "";
}
?>