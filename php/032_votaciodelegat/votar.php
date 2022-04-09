<?php 
require_once("inc/constants.php");
session_start();
if (isset($_POST["id"])){
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $idvot = $_POST["id"];
    $idusr = $_SESSION["usrid"];
    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    $sql = "UPDATE "._TABLEUSUARIS." SET vota_a = $idvot, data_hora_voto = SYSDATE(), ip = '".getUserIpAddr()."' WHERE id = $idusr";
    $res = $mysqli->query($sql);
    header("Location: panell.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>