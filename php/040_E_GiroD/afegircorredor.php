<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/estils.css">

</head>

<body>
    <div class="ejf giro">
        <?php
        require_once("inc/config.inc");
        require_once("inc/funcions.inc");
        include("inc/capcalera.inc");

        ?>
        <div class="contenido">
            <form action="inc/guardarcorredor.php" method="post" enctype="multipart/form-data">
                <table>
                    <tbody>
                        <tr>
                            <td>Nom:</td>
                            <td><input type="text" name="corredor" size="50"></td>
                        </tr>
                        <tr>
                            <td>Puntuacio:</td>
                            <td><input type="text" name="puntuacio" size="50"></td>
                        </tr>
                        <tr>
                            <td>Equip:</td>
                            <td><select name="equip" id="equip">
                                <?php
                                    $mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
                                    if (!$mysqli) {
                                        echo "Error! No es pot conectar a la base de dades";
                                        exit();
                                    } else {
                                        $sql = "SELECT * FROM "._TAULAEQUIP;
                                        $res = $mysqli->query($sql);
                                        if (mysqli_num_rows($res)>0) {
                                            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value='".$row["id"]."'>".$row["nomequip"]."</option>";
                                            }
                                        }
                                    }
                                ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Foto:</td>
                            <td><input type="file" name="fitxer" id="fitxer"></td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    <input type="submit" value="Afegir">
                </p>
            </form>
        </div>

        <?php
        include("inc/peu.inc");
        ?>
    </div>

</body>

</html>