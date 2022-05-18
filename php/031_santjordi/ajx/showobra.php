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
    $sql = "SELECT idusuariautor, titolobra, nomfitxer, idobra, nomcategoria, idcategoriaobra FROM "._TABLEOBRA." o INNER JOIN "._TABLECATEGORIES." c ON o.idcategoriaobra = c.idcategoria AND activa = 1";
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
}else if ($_POST["op"] == "chvisibility") {
    $sql = "UPDATE obra SET activa = ".$_POST["data"]." WHERE idobra = ".$_POST["id"];
    $res = $mysqli->query($sql);
    echo json_encode($JSON["success"] = $res);
}else if ($_POST["op"] == "limit") {
    $JSON["data"] = _LIMITPODI;
    echo json_encode($JSON);
}else if ($_POST["op"] == "publicat") {
    foreach ($_POST["data"] as $key => $value) {
        $sql = "INSERT INTO "._TABLERESULTAT." (idobra, idcategoria, posicio) VALUES (".$value.",".$_POST["cat"].", ".($key+1).");";
        $res = $mysqli->query($sql);
    }
}else if($_POST["op"] == "resxcat"){
    $JSON["result"] = false;
    $sql = "SELECT * FROM "._TABLERESULTAT." WHERE idcategoria = ".$_POST["idc"];
    $res = $mysqli->query($sql);
    if (mysqli_num_rows($res) > 0){
        while ($row=$res->fetch_array(MYSQLI_ASSOC)){
            $JSON["data"][] = $row;                
        }
        $JSON["result"] = true;
    }
    echo json_encode($JSON);
}else if($_POST["op"] == "session"){
    $JSON["vots"] = _VOTES;
    $JSON["upl"] = $_SESSION['upl']; 
    $JSON["acc"] = $_SESSION["acc"];
    $JSON["win"] = _GUANYADORS;
    $sql = "SELECT * FROM " . _TABLECATEGORIES;
    $res = $mysqli->query($sql);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        $JSON["cat"][$row["idcategoria"]] = 0;
    }
    $sql = "SELECT votacio.idobra , obra.idcategoriaobra FROM "._TABLEVOTACIO." INNER JOIN "._TABLEOBRA." ON votacio.idobra = obra.idobra AND votacio.idusuari = ".$_SESSION["idusr"];
    $res = $mysqli->query($sql);
    if ($res){
        while ($row=$res->fetch_array(MYSQLI_ASSOC)){
            $JSON["cat"][$row["idcategoriaobra"]] += 1;
        }
    }
    echo json_encode($JSON);
}else if ($_POST["op"] == "vote"){
    $sql = "INSERT INTO "._TABLEVOTACIO." (idusuari, idobra) VALUES (".$_SESSION["idusr"].", ".$_POST['idobra'].")";
    $mysqli->query($sql);
}else if ($_POST["op"] == "delete"){
    $sql = "SELECT idobra, idusuariautor, nomfitxer FROM "._TABLEOBRA." WHERE idusuariautor = ".$_SESSION["idusr"];
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        if ($row["idobra"] == $_POST["idobra"]){
            $mysqli->query("DELETE FROM "._TABLEOBRA." WHERE idobra = ".$row["idobra"]);
            $mysqli->query("DELETE FROM "._TABLEVOTACIO." WHERE idobra = ".$row["idobra"]);
            unlink("../".$row["nomfitxer"]);
        }
    }
}
