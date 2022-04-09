<?php
require_once("inc/constants.php");
session_start();
if ($_SESSION["log"] == "USER") {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Hola <?=$_SESSION["usr"]?>!</h1>
        <?php
            $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
            $id = $_SESSION["usrid"];
            $sql = "SELECT vota_a FROM "._TABLEUSUARIS." WHERE id = $id";
            $res = $mysqli->query($sql);
            $row=$res->fetch_array(MYSQLI_ASSOC);
            if ($row["vota_a"] == ""){
                $sql = "SELECT id, nom, cognom1, cognom2 FROM "._TABLEUSUARIS." WHERE candidat = 'SÍ'";
                $res = $mysqli->query($sql);
                echo "<form action='votar.php' method='POST'><ul>";
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                    if ($row["id"] != $_SESSION["usrid"]){
                        echo "<li style='display: inline;'>".$row["nom"]." ".$row["cognom1"]." ".$row["cognom2"]."</li>
                        <button type='submit' name='id' value='".$row["id"]."'>Votar</button><br>";
                    }
                }
                echo "</ul></form>";
            }else{
                $sql = "SELECT vota_a FROM alumne WHERE actiu = 1";
                $res = $mysqli->query($sql);
                while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                    if($row["vota_a"]==''){
                        $nulls+=1;
                    }
                }
                if ($nulls > 0){
                    echo "<h3>Ja has votat i encara queden persones per votar</h3>";
                }else if ($nulls == 0){
                    $sql = "SELECT nom, count(*) 'vots' FROM " . _TABLEUSUARIS . " WHERE actiu = 1 GROUP BY vota_a ORDER BY vots DESC";
                    $res = $mysqli->query($sql);
                    $num=0;
                    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
                        if ($num == 0){
                            $num = 1;
                            echo "<h2>Ha guanyat ".$row['nom']."</h2>";
                            echo "<table><th>Alumne</th><th>Vots</th>";
                        }
                        echo "<tr><td>".$row['nom']."</td><td>".$row['vots']."</td></tr>";
                    }
                    echo "</table>";
                }
            }

        ?>
    </body>
    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>