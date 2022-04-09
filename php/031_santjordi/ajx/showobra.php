<?php
session_start();
require_once("../inc/constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
$mysqli->set_charset("utf8");
if ($_POST["op"]=="own"){// retorna les obres de l'usuari logat
    $sql = "SELECT idusuariautor, titolobra, nomfitxer, idobra, nomcategoria FROM "._TABLEOBRA." o INNER JOIN "._TABLECATEGORIES." c ON o.idcategoriaobra = c.idcategoria AND o.idusuariautor = ".$_SESSION["idusr"];
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        $JSON["data"][] = $row; 
    }
    echo json_encode($JSON);
}else if($_POST["op"]=="all"){// retorna totes les obres 
    $sql = "SELECT idusuariautor, titolobra, nomfitxer, idobra, nomcategoria FROM "._TABLEOBRA." o INNER JOIN "._TABLECATEGORIES." c ON o.idcategoriaobra = c.idcategoria AND activa = 1";
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        $JSON["data"][] = $row;
    }
    echo json_encode($JSON);
}else if($_POST["op"]=="max"){// retorna el nombre d'obres de l'usuari logat
    $sql = "SELECT titolobra FROM "._TABLEOBRA." o INNER JOIN "._TABLECATEGORIES." c ON o.idcategoriaobra = c.idcategoria AND idusuariautor = ".$_SESSION["idusr"];
    $res = $mysqli->query($sql);
    echo mysqli_num_rows($res);
}else if ($_POST["op"]=="votsusr"){// retorna els vots de l'usuari logat
    $sql = "SELECT idobra FROM "._TABLEVOTACIO." WHERE idusuari = ".$_SESSION["idusr"];
    $res = $mysqli->query($sql);
    if ($res){
        while ($row=$res->fetch_array(MYSQLI_ASSOC)){
            $JSON["data"][] = $row;                
        }
    } else {
        $JSON["data"][] = false;
    }
    $JSON["idusr"] = $_SESSION["idusr"];
    $JSON["selfvote"] = _SELFVOTE;
    echo json_encode($JSON);
}else if ($_POST["op"]=="obresxcat"){
    $sql = "SELECT o.idobra, o.titolobra, o.nomfitxer, o.activa, (SELECT COUNT(*) FROM " . _TABLEVOTACIO . " WHERE idobra = o.idobra) vots FROM " . _TABLEOBRA . " o WHERE idcategoriaobra = ".$_POST["idc"]." GROUP BY idobra ORDER BY vots DESC";
    $res = $mysqli->query($sql);
    if (mysqli_num_rows($res) > 0) {
            while ($row=$res->fetch_array(MYSQLI_ASSOC)){
            $JSON["data"][] = $row;                
        }
        echo json_encode($JSON);
    }else{
        echo json_encode($JSON["fail"] = false);
    }
} else if ($_POST["op"] == "chvisibility") {
    $sql = "UPDATE obra SET activa = ".$_POST["data"]." WHERE idobra = ".$_POST["id"];
    $res = $mysqli->query($sql);
    echo json_encode($JSON["success"] = $res);
}