<?php
    session_start();
    require_once("inc/constant.inc");
    if (!isset($_SESSION["pts"])){
        $_SESSION["pts"] = 0;
    }
    if (!isset($_SESSION["try"])){
        $_SESSION["try"] = 0;
    }else{
        if($_SESSION["try"]>=3){
            header("Location: final.php");
            exit();
        }else{
            $_SESSION["try"]+=1;
        }
    }
    if(isset($_POST["res"])){
        if ($_SESSION["img"]==$_POST["res"]){
            $_SESSION["pts"] += 1;
            $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
            $id = $_SESSION["usrid"];
            $sql = "SELECT idusuari FROM "._TABLEPARTIDES." WHERE idusuari = $id";
            $res = $mysqli->query($sql);
            if(mysqli_num_rows($res)>0){
                $sql = "UPDATE "._TABLEPARTIDES." SET puntuacio = ".$_SESSION['pts']." WHERE idusuari = $id;";
            }else{
                $sql = "INSERT INTO "._TABLEPARTIDES." (idusuari, numpartida, puntuacio, datahora) VALUES ('".$_SESSION['usrid']."', 1, '".$_SESSION["pts"]."', NOW());";
            }
            $res = $mysqli->query($sql);
        }
    }
    $_SESSION["img"] = rand(1,15);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estils.css">
    <title>Quiz Ciclisme</title>
</head>
<body>
    <center>
        <div class="container bg-dark text-light">
            <b>Hola <?=$_SESSION['usr']?>, </b> a veure quants ciclistes encertes!<br>
            <form action="" method="post">
                <?php
                    $img = $_SESSION["img"];
                    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                    $sql = "SELECT foto FROM "._TABLECORREDORS." WHERE id = $img";
                    $res = $mysqli->query($sql);
                    $row=$res->fetch_array(MYSQLI_ASSOC);
                    if ($res){
                        $img = $row['foto'];
                        echo "<img src='img/$img'><br>";
                    }
                ?>
                    <select name="res" id="res">
                        <?php
                            $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                            $sql = "SELECT * FROM "._TABLECORREDORS."";
                            $res = $mysqli->query($sql);
                            if($res){
                                while($row=$res->fetch_array(MYSQLI_ASSOC)){
                                    echo "<option value='".$row['id']."'>".$row['nom']."</option>";
                                }
                            }
                        ?>
                    </select><br>

                <span>Portes <?=$_SESSION["pts"]?> punts!</span><br>
                <input type='submit' formaction="partida.php" value='Enviar'> - 
                <input type="submit" formaction="redirects/restart.php" value="Tornar a l'inici"> -
                <input type="submit" formaction="mostrarinformacio.php" value="Mostrar puntuació">
            </form>
            
        </div>
    </center>
</body>
</html>
 