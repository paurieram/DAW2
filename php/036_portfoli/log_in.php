<?php
session_start();
require_once("const/constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
$sql = "SELECT * FROM ". _TABLEUSUARIS ." WHERE mail_usr = '".$_POST["username"]."' LIMIT 1";
$res = $mysqli->query($sql);
if (mysqli_num_rows($res)>0) {
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        if ($row["pass_usr"] == $_POST["pass"]){
            $_SESSION["LOG"]="USER";
            header("Location: index.php");
            exit();
        }else{
            header("Location: login.php");
            exit();
        }
    }
}else{
    header("Location: login.php");
    exit();
}
?>