<?php

require_once("inc/functions.inc");
require_once("inc/constant.inc");

$operacio= isset($_GET["operacio"])?$_GET["operacio"]:"";
if ($operacio==""){
    echo "Error, Operacio no especificada";
    exit();
}elseif ($operacio=="1") {
    $nom = isset($_POST["nom"])?$_POST["nom"]:"";
    $cognom = isset($_POST["cognom"])?$_POST["cognom"]:"";
    $mysqli = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);
    if($mysqli->connect_errno){
        echo "Error en la connexió".$mysqli->connect_errno."-".$mysqli->connect_error;
        exit();
    }
    $sql="INSERT INTO "._TABLEUSUARIS." (nom,cognom,idaficio) VALUES ('$nom','$cognom',1)";
    $result = $mysqli->query($sql);
    if (!$result){
        echo "Error en el INSERT".$mysqli->errno."---".$mysqli->error;
        exit();
    }
}elseif ($operacio=="2") {
    $mysqli = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);
    $sql="SELECT * FROM "._TABLEUSUARIS." u INNER JOIN "._TABLEAFICIONS." a ON u.idaficio = a.id";
    $result = $mysqli->query($sql);
    if (!$result){
        echo "Error en el Select".$mysqli->errno."-".$mysqli->error;
        exit();
    }else{
        if($result->num_rows>0){
            while ($row=$result->fetch_array()) {
                echo $row[0]." | ".$row[1]."<br>";
            }
        }
    }
}

?>