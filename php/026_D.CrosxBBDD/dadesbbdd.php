<?php

require_once("inc/functions.inc");
require_once("./inc/constant.inc");

$operacio= isset($_POST["operacio"])?$_POST["operacio"]:"";
$num = isset($_POST["num"])?$_POST["num"]:"";

if ($num==""){
    echo "<h1>Error Inesperat</h1>";
    exit();
}else{
    $operacio="2";
    $categoriafiltre=$num;
}

if ($operacio==""){
    //fsdf
}elseif ($operacio=="2") {
    $mysqli = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);
    $sql = "SELECT dorsal, nom, primer_cognom, segon_cognom, curs, nom_categoria, DATE_FORMAT(TIMEDIFF(temps_arribada, temps_sortida), '%i\' %s\'\'') 'temps_volta' 
    FROM corredor INNER JOIN categoria ON corredor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria = $categoriafiltre 
    AND corredor.temps_arribada IS NOT NULL order by temps_volta";
    $result = $mysqli->query($sql);
    if (!$result){
        echo "Error en el Select".$mysqli->errno."-".$mysqli->error;
        exit();
    }else{
        if($result->num_rows>0){
            echo '<table><tr><th scope="col">Dorsal</th><th scope="col">Nom</th><th scope="col">1r Cognom</th><th scope="col">2n Cognom</th><th scope="col">Curs</th><th scope="col">Categoria</th><th scope="col">Temps</th></tr>';
            while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>";
                foreach ($row as $key => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}


?>