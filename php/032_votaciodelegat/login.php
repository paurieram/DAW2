<?php
require_once("inc/constants.php");
session_start();
if(isset($_POST["usr"]) && $_POST["usr"] != "" && $_POST["pas"] != ""){
    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    $usr = $_POST["usr"];
    $pas = $_POST["pas"];
    $sql = "SELECT * FROM "._TABLEUSUARIS." WHERE correu = '$usr' LIMIT 1";
    $res = $mysqli->query($sql);
    if ($res){
        while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
            if ($row['passwd'] == $pas){
                if ($row['actiu']=="1"){
                    $_SESSION["usr"] = $row['nom']." ".$row['cognom1'];
                    $_SESSION["log"] = "USER";
                    $_SESSION["usrid"] = $row['id'];
                    header("Location: panell.php");
                    exit();
                }else{
                    $_SESSION["err"] = "El usuari No esta activat";
                    $_SESSION["col"] = "red";
                    header("Location: index.php");
                    exit();
                }
            }
        }
    }
    $_SESSION["err"] = "Login incorrecte";
    $_SESSION["col"] = "red";
    header("Location: index.php");
    exit();
}else{
    header("Location: index.php");
    exit();
}
?>