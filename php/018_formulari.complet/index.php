<?php
require_once("./inc/functions.inc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>018</title>
</head>
<body>
    <h1>Dades personals (formulari complet)</h1>
    <form action="recollirdades.php" method="post">
        <table>
            <tr>
                <td>
                    <label>
                        <b>Nom:</b><br>
                        <input type="text" name="nom" id="nom" size="20" >
                    </label>
                </td>
                <td>
                    <label>
                        <b>Cognom:</b><br>
                        <input type="text" name="cognom" id="cognom" size="20" >
                    </label>
                </td>
                <td>
                    <label>
                        <b>Edat:</b><br>
                        <?php
                            $valors = array("0"=>".....","1"=>"Menys de 20 anys", "2"=>"Entre 20 i 39 anys", "3"=>"Entre 40 i 59 anys", "4"=>"60 anys o mes");
                            echo getDesplegable("edat","edat",$valors);
                        ?>
                    </label>
                </td>
                <td>
                    <label>
                        <b>Aficions:</b><br>
                        <?php
                            $valors = array("0"=>".....","1"=>"Videojocs", "2"=>"Futbol", "3"=>"Estudiar", "4"=>"Altres");
                            echo getDesplegable("aficions","aficions",$valors);
                        ?>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <b>Pes:</b><br>
                        <input type="number" name="pes" id="pes" size="20" min="1" max="150" >
                    </label>
                </td>
                <td>
                    <label>
                        <b>Pes:</b><br>
                        <input type="radio" name="sexe" id="sexe" size="20" value="Home">HOME
                        <input type="radio" name="sexe" id="sexe" size="20" value="Dona">DONA
                    </label>
                </td>
                <td>
                    <label>
                        <b>Religió:</b><br>
                        <input type="checkbox" name="cristia" id="cristia">Cristia
                        <input type="checkbox" name="musulma" id="musulma">Musulma
                        <input type="checkbox" name="jueva" id="jueva">Jueva
                        <input type="checkbox" name="altres" id="altres">Altres
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Esborrar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
