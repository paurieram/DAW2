<?php

require_once("../inc/functions.inc");
require_once("../inc/constant.inc");

$operacio= isset($_POST["operacio"])?$_POST["operacio"]:"";
$num = isset($_POST["num"])?$_POST["num"]:"";
$num2 = isset($_POST["num2"])?$_POST["num2"]:"";

if ($num==""){
    echo "<h1>Error Inesperat</h1>";
    exit();
}else{
    $operacio="2";
}



if ($operacio==""){
//     echo "Error, Operacio no especificada";
//     exit();
// }elseif ($operacio=="1") {
    // $nom = isset($_POST["nom"])?$_POST["nom"]:"";
    // $cognom = isset($_POST["cognom"])?$_POST["cognom"]:"";
    // $mysqli = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);
    // if($mysqli->connect_errno){
    //     echo "Error en la connexió".$mysqli->connect_errno."-".$mysqli->connect_error;
    //     exit();
    // }
    // $sql="INSERT INTO "._TABLEUSUARIS." (nom,cognom,idaficio) VALUES ('$nom','$cognom',1)";
    // $result = $mysqli->query($sql);
    // if (!$result){
    //     echo "Error en el INSERT".$mysqli->errno."---".$mysqli->error;
    //     exit();
    // }
}elseif ($operacio=="2") {
    $mysqli = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);
    if $num2!=""{
        $sql = "SELECT dorsal, nom, primer_cognom, segon_cognom, curs, nom_categoria, DATE_FORMAT(TIMEDIFF(temps_arribada, temps_sortida), '%i\' %s\'\'') 'temps_volta' 
        FROM corredor INNER JOIN categoria ON corredor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria = $num OR categoria.id_categoria = $num2
        AND corredor.temps_arribada IS NOT NULL order by temps_volta";
    }else{
        $sql = "SELECT dorsal, nom, primer_cognom, segon_cognom, curs, nom_categoria, DATE_FORMAT(TIMEDIFF(temps_arribada, temps_sortida), '%i\' %s\'\'') 'temps_volta' 
        FROM corredor INNER JOIN categoria ON corredor.id_categoria = categoria.id_categoria WHERE categoria.id_categoria = $num
        AND corredor.temps_arribada IS NOT NULL order by temps_volta";
    }
    $result = $mysqli->query($sql);
    if (!$result){
        echo "Error en el Select".$mysqli->errno."-".$mysqli->error;
        exit();
    }else{
        if($result->num_rows>0){
            echo '<table><tr><th scope="col">Dorsal</th><th scope="col">Nom</th><th scope="col">1r Cognom</th><th scope="col">2n Cognom</th><th scope="col">Temps</th></tr>';
            while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><td>".$row['dorsal']."</td><td>".$row['nom']."</td><td>".$row['primer_cognom']."</td><td>".$row['segon_cognom']."</td><td>".$row['temps_volta']."</td></tr>";
            }
            echo "</table>";
        }
    }
}


?>