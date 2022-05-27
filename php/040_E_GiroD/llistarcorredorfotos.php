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
        <form action="inc/modificacorredor.php" method="post" enctype="multipart/form-data">
            <?php
                $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                if (!$mysqli) {
                    echo "Error! No es pot conectar a la base de dades";
                    exit();
                } else {
                    $sql = "SELECT c.*, e.nomequip FROM "._TAULACORREDOR." c INNER JOIN "._TAULAEQUIP." e WHERE c.idequip = e.id AND foto IS NOT NULL";
                    $res = $mysqli->query($sql);
                    echo "<select name='corredor'>";
                    if (mysqli_num_rows($res)>0) {
                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            echo "<option value='".$row["id"]."'>".$row["nom"]."</option>";
                        }
                    }
                    echo "</select>";
                }
            ?><br>
            <input type="file" name="fitxer" id="fitxer"><br>
            <input type="submit" value="Afegir">
        </form>
    </div>

      <?php
        include("inc/peu.inc");
       ?>
    </div>

</body>
</html>
