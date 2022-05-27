<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="css/estils.css">

</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #66CC99;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #66CC99;
}
</style>

<body>
<div class="ejf giro">
  <?php
    require_once("inc/config.inc");
    require_once("inc/funcions.inc");
    include("inc/capcalera.inc");
   ?>

      <div class="contenido">

        <?php
            $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
            if (!$mysqli) {
                echo "Error! No es pot conectar a la base de dades";
                exit();
            } else {
                echo "<TABLE><th>NOM</th><th>PUNTUACIO</th><th>EQUIP</th><th>FOTO</th>";
                $sql = "SELECT c.*, e.nomequip FROM "._TAULACORREDOR." c INNER JOIN "._TAULAEQUIP." e WHERE c.idequip = e.id";
                $res = $mysqli->query($sql);
                if (mysqli_num_rows($res)>0) {
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        // echo json_encode($row);exit();
                        echo "<TR>";
                        echo "<TD>".$row["nom"]."</TD>";
                        echo "<TD>".$row["puntuacio"]."</TD>";
                        echo"<TD>".$row["nomequip"]."</TD>";
                        if ($row["foto"] != ""){
                            echo "<TD><a href='".$row['foto']."' target='_blank'>foto</a></TD>";
                        }else{
                            echo"<TD> No hi ha foto </TD>";
                        }
                        echo "</TR>";
                    }
                }
                echo "</TABLE>";
            }
         ?>

      </div>

      <?php
        include("inc/peu.inc");
       ?>
    </div>

</body>
</html>
