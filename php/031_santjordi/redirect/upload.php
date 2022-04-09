<?php
session_start();
require_once("../inc/constants.php");
if ($_SESSION["log"] == "USER"){
    if ( isset( $_FILES['pdf'] ) ) {
        if ($_FILES['pdf']['type'] == "application/pdf") {
            $directori = "obres/";
            $source_file = $_FILES['pdf']['tmp_name'];
            $dest_file = $directori.$_SESSION["idusr"]."-".$_FILES['pdf']['name'];//    /obres/25-nom.pdf
            if (file_exists($dest_file)) {
                $_SESSION["col"]="alert-danger";
                $_SESSION["err"]="El fitxer ya existeix!!";
                header("Location: ../menu.php?acc=2");
                exit();
            }
            else {
                move_uploaded_file( $source_file, "../".$dest_file )
                or die("Error!!");
                $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                $sql = "INSERT INTO "._TABLEOBRA." (titolobra, idusuariautor, idcategoriaobra, nomfitxer) VALUES ('".$_POST['nom']."', ".$_SESSION['idusr'].", ".$_POST['categ'].", '$dest_file');";
                $res = $mysqli->query($sql);
                $_SESSION['upl']-=1;
                $_SESSION["col"]="alert-success";
                $_SESSION["err"]="Arxiu pujat correctament!!";
                header("Location: ../menu.php?acc=2");
                exit();
            }
        }else {
            if ( $_FILES['pdf']['type'] != "application/pdf") {
                $_SESSION["col"]="alert-danger";
                $_SESSION["err"]="Extensio de fitxer Invalida, Ha de ser pdf!!";
                header("Location: ../menu.php?acc=2");
                exit();
            }
        }
    }
}else{
    header("Location: ../menu.php");
}
?>