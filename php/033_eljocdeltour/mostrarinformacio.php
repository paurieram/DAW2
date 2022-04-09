<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Quiz Ciclisme</title>
</head>
<body>
    <?php
        require_once("inc/constant.inc");
        $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
        $sql = "SELECT * FROM "._TABLEPARTIDES;
        $res = $mysqli->query($sql);
        echo "<table><tr><th>Usuari</th><th>Num Partida</th><th>Puntuació</th><th>Data</th></tr>";
        if($res){
            while($row=$res->fetch_array(MYSQLI_ASSOC)){
                echo "<tr><td>".$row['idusuari']."</td><td>".$row['numpartida']."</td><td>".$row['puntuacio']."</td><td>".$row['datahora']."</td></tr>";
            }
        }
        echo "</table>";
    ?>
    <a class="btn btn-secondary" href="index.php">inici</a>
    <style>
        table, th, td{
            border: 1px solid black;
            background-color: black;
        }
        td, th{
            background-color: white;
        }
    </style>
</body>
</html>