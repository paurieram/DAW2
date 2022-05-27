<?php
require_once("config.inc");
require_once("funcions.inc");


$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
if (!$mysqli) {
    echo "Error! No es pot conectar a la base de dades";
    exit();
} else {
    if ($_FILES["fitxer"] != ""){
        $source_file = $_FILES['fitxer']['tmp_name'];
        $dest_file = "imgfotocorredor/".$_POST["corredor"]."_".$_FILES['fitxer']['name'];
        move_uploaded_file($source_file, "../".$dest_file);
        $sql = "INSERT INTO "._TAULACORREDOR." (nom, puntuacio, idequip, foto) VALUES ('".$_POST["corredor"]."', ".$_POST["puntuacio"].", ".$_POST["equip"].", '".$dest_file."')";
        $res = $mysqli->query($sql);
        if ($res){
            header("Location: ../resultat.php?r=ok");
            exit();
        }else{
            header("Location: ../resultat.php?r=ko");
            exit();
        }
    }else{
        $sql = "INSERT INTO "._TAULACORREDOR." (nom, puntuacio, idequip) VALUES ('".$_POST["corredor"]."', ".$_POST["puntuacio"].", ".$_POST["equip"].")";
        $res = $mysqli->query($sql);
        if ($res){
            header("Location: ../resultat.php?r=ok");
            exit();
        }else{
            header("Location: ../resultat.php?r=ko");
            exit();
        }
    }
}?>



