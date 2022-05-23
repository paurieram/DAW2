<?php
session_start();
require_once("constants.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

if ( isset( $_FILES['imgi'] ) ) {
    if ($_FILES['imgi']['type'] == "image/jpeg" || $_FILES['imgi']['type'] == "image/jpg") {
        $source_file = $_FILES['imgi']['tmp_name'];
        $dest_file = "imatges/".rand(0,1000000)."-".$_POST["id"]."-".$_FILES['imgi']['name'];
        if (file_exists($dest_file)) {
            $_SESSION["c"]="alert-danger";
            $_SESSION["o"]="El fitxer ya existeix!!";
            header("Location: index.php");
            exit();
        }else {
            move_uploaded_file( $source_file, $dest_file )
            or die("Error!!");
            $sql = "INSERT INTO "._TABLEIMG." (idprofessio, imatge) VALUES  (".$_POST["id"].", '".$dest_file."');";
            $res = $mysqli->query($sql);
            $_SESSION["c"]="alert-success";
            $_SESSION["o"]="Arxiu pujat correctament!!";
            header("Location: index.php");
            exit();
        }
    }else {
        $_SESSION["c"]="alert-danger";
        $_SESSION["o"]="Extensio de fitxer Invalida, Ha de ser jpg!!";
        header("Location: index.php");
        exit();
    }
}else if(isset( $_FILES['imga'] )){
    if ($_FILES['imga']['type'] == "image/jpeg" || $_FILES['imga']['type'] == "image/jpg") {
        $source_file = $_FILES['imga']['tmp_name'];
        $dest_file = "imatges/".$_POST["id"]."-".$_FILES['imga']['name'];
        if (file_exists($dest_file)) {
            $_SESSION["c"]="alert-danger";
            $_SESSION["o"]="El fitxer ya existeix!!";
            header("Location: index.php");
            exit();
        }else {
            move_uploaded_file( $source_file, $dest_file )
            or die("Error!!");
            $sql = "UPDATE "._TABLESOCIS." SET avatar = '".$dest_file."' WHERE idsoci = ".$_POST["id"];
            $res = $mysqli->query($sql);
            $_SESSION["c"]="alert-success";
            $_SESSION["o"]="Arxiu pujat correctament!!";
            header("Location: index.php");
            exit();
        }
    }else {
        $_SESSION["c"]="alert-danger";
        $_SESSION["o"]="Extensio de fitxer Invalida, Ha de ser jpg!!";
        header("Location: index.php");
        exit();
    }
}
// header("Location: index.php");
?>