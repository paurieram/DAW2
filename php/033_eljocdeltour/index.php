<?php
require_once("inc/constant.inc");
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de ciclisme </title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estils.css">
</head>
<body>
    <center>
    <div class="container bg-dark text-light">
        <h1>Quiz de ciclisme </h1>
        <form action="redirects/log.php" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label>
                                <b>Nom del jugador:</b>
                                <input type="text" name="jug" id="jug" size="20" maxlength="20">
                            </label>
                        </td>
                        <td colspan="5">
                            <input type="submit" class="btn btn-secondary" value="Començar Quiz">
                        </td>
                    </tr> 
                    <tr>
                        <td><span style="color: red;"><?=$_SESSION["err"]?></span></td>
                        
                    </tr>  
                </tbody>
            </table>
        </form>
        <div class="mt-2"></div>
        <p>L'objectiu d'aquest joc es endevinar el nom i el primer congnom de l'imatge del cilcista 
            que mostrarem a continuació.<br>
        <b>Si encertes el nom de 5 ciclistes hauras gunayat!</b>
        </p>
    </div>
    <center>  
</body>
</html>
<?php 
unset($_SESSION["err"]);
?>