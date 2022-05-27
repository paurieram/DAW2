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
        $sql = "SELECT * FROM "._TAULACORREDOR." WHERE id = ".$_POST["corredor"];
        $res = $mysqli->query($sql);
        $row = $res->fetch_array(MYSQLI_ASSOC);
        $dest_file = "imgfotocorredor/".$row["nom"]."_".$_FILES['fitxer']['name'];
        unlink("../".$row["foto"]);
        move_uploaded_file($source_file, "../".$dest_file);
        $sql = "UPDATE "._TAULACORREDOR." SET foto = '".$dest_file."' WHERE id = ".$_POST["corredor"];
        $res = $mysqli->query($sql);
        if ($res){
            header("Location: ../resultat.php?r=ok");
            exit();
        }else{
            header("Location: ../resultat.php?r=ko");
            exit();
        }
    }
}