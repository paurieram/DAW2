<?php
if (isset($_POST["jug"])){
    session_start();
    require_once("../inc/constant.inc");
    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    $usr = $_POST["jug"];
    $sql = "SELECT * FROM "._TABLEUSUARIS." WHERE alias = '$usr'";
    $res = $mysqli->query($sql);
    $row=$res->fetch_array(MYSQLI_ASSOC);
    if ($row){
        if ($row["actiu"]==0){
            $_SESSION["err"]="Error! El usuari no esta actiu";
            header("Location: ../index.php");
            exit();
        }else { 
            $_SESSION["usr"] = $row["alias"];
            $_SESSION["usrid"] = $row["id"];
            header("Location: ../partida.php");
            exit();
        }
    }
}else{
    header("Location: ../index.php");
    exit();
}

?>