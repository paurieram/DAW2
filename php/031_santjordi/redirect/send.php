<?php
session_start();
require_once("../inc/constants.php");
ini_set('display_errors', '1');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (isset($_POST["forgetEmail"])){
    // import PHPMAILER
    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    $usr = isset($_POST["forgetEmail"])?$_POST["forgetEmail"]:"";
    $sql = "SELECT * FROM "._TABLEUSUARIS." WHERE codiusuari = '$usr'";
    $res = $mysqli->query($sql);
    if (mysqli_num_rows($res)>0){
        while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
            if ($row['codiusuari'] == $usr){
                //SendMail
                $newpassword="";
                for($i= 0; $i<_LONGPASS;$i++){
                    $randnum = rand(0,9);
                    $newpassword .= $randnum;
                }
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host = _HOSTMAIL;
                $mail->SMTPAuth = true;
                $mail->Username = _USERMAIL;
                $mail->Password = _PASSMAIL;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom(_USERMAIL);
                $mail->addAddress($usr);
                $mail->isHTML(true);
                $mail->Subject = "Recuperació de la contrasenya de Ginebro X Sant Jordi";
                $mail->Body = "La teva nova contrasenya es: ".$newpassword.". <br> Si vols cambiar la teva contrasenya contacta amb un administrador";
                try {
                    $mail->send();
                } catch (Exception $e) {
                    echo "";//"Mailer Error: " . $mail->ErrorInfo;
                }
                $sql = "SELECT idusuari FROM "._TABLEUSUARIS." WHERE codiusuari = '$usr'";
                $res = $mysqli->query($sql);
                if (mysqli_num_rows($res)>0){
                    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                        $id = $row["idusuari"];
                    }
                }
                $sql = "UPDATE "._TABLEUSUARIS." SET contrasenyausuari = SHA2('$newpassword', 256) WHERE idusuari = $id";
                $res = $mysqli->query($sql);
                $_SESSION["err"] = "Enviat Correctament";
                $_SESSION["col"] = "green";
                header("Location: ../index.php");
                exit();
            }
        }
    }else{
        $_SESSION["err"] = "Enviat Correctament";
        $_SESSION["col"] = "green";
        header("Location: ../index.php");
        exit();
    }
}else{ 
    header("Location: ../index.php");
}
?>