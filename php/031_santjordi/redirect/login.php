<?php
session_start();
require_once("../inc/constants.php");
if (isset($_POST["usr"])){
    $_SESSION["usr"] = $_POST["usr"];
    $_SESSION["pas"] = hash('sha256', $_POST["pas"]);
    if ($_SESSION["usr"] == _USUARIADMIN && $_SESSION["pas"] == _PASSWORDADMIN){
        $_SESSION["usr"] = "ADMIN";
        $_SESSION["log"] = "ADMIN";
        header("Location: ../admin.php");
        exit();
    }
    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    $usr = $_SESSION["usr"];
    $pas = $_SESSION["pas"];
    $sql = "SELECT * FROM "._TABLEUSUARIS." WHERE codiusuari = '$usr'";
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['contrasenyausuari'] == $pas){
            if ($row['usuariactiu'] == 1){
                $_SESSION["usr"] = $row['nomusuari']." ".$row['cognomusuari'];
                $_SESSION["log"] = "USER";
                $_SESSION["idusr"] = $row["idusuari"];
                $id = $_SESSION["idusr"];
                $sql = "SELECT * FROM "._TABLEVOTACIO." WHERE idusuari = '$id'";
                $resu = $mysqli->query($sql);
                if (mysqli_num_rows($resu)>=_VOTES){
                    $_SESSION["vots"]=0;
                }else if (mysqli_num_rows($resu)==0){
                    $_SESSION["vots"]=_VOTES;
                }else if (mysqli_num_rows($resu)<_VOTES){
                    $_SESSION["vots"]=_VOTES-mysqli_num_rows($resu);
                }
                $sql = "SELECT * FROM "._TABLEOBRA." WHERE idusuariautor = '$id'";
                $resul = $mysqli->query($sql);
                if (mysqli_num_rows($resul)==_OBRES){
                    $_SESSION['upl']=0;
                }else if(mysqli_num_rows($resul)==0){
                    $_SESSION['upl']=_OBRES;
                }else if(mysqli_num_rows($resul)<_OBRES){
                    $_SESSION['upl']=_OBRES-mysqli_num_rows($resul);
                }
                header("Location: ../menu.php");
                exit();
            }else{
                $_SESSION["err"] = "L'usuari està desactivat";
                $_SESSION["col"] = "red";
                header("Location: ../index.php");
                exit();
            }
        }
    }
    $_SESSION["err"] = "Login incorrecte";
    $_SESSION["col"] = "red";
    header("Location: ../index.php");
    exit();
}else{ 
    header("Location: ../index.php");
}
?>