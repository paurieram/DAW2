<?php
require_once("constant.php");
$mysqli = new mysqli(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
if ($_POST['op']==1){
    $sql = "SELECT nomsoci, nomprofessio FROM "._TABLESOCIS." s INNER JOIN "._TABLEPROFESIO." p WHERE p.idprofessio = s.idprofessio LIMIT ".$_POST['num'].",5";
    $res = $mysqli->query($sql);
    if ($res){
        echo "<thead><tr><th scope='col' style='width: 700px;'>Nom</th><th scope='col'>Professio</th><th></th></tr></thead><tbody>";
        while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr scope="row"><td>'.$row["nomsoci"].'</td><td>'.$row["nomprofessio"].'<td></tr>';
        }
        echo "</tbody>";
    }else{
        echo "";
    }
}else if ($_POST['op']==0){
    $sql = "SELECT nomsoci FROM "._TABLESOCIS;
    $res = $mysqli->query($sql);
    echo mysqli_num_rows($res);
}