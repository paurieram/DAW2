<?php
$id = isset($_POST["soci"]) ? $_POST["soci"] : "";
if ($id == ""){
    $JSON["succeed"] = false;
    $JSON["message"] = "No S'ha rebut id";
}else{
    $mysqli = new mysqli("localhost", "usersantjordi", "Li7m6oQu", "dbSantJordi");
    $sql = "SELECT nomusuari, cognomusuari FROM usuari WHERE $id = idusuari";
    $res = $mysqli->query($sql);
    $row=$res->fetch_array(MYSQLI_ASSOC);
    if ($res->num_rows>0){
        $JSON["succeed"] = true;
        $JSON["message"] = "Executat correctament";
        $JSON["data"] = $row;
    }else{
        $JSON["succeed"] = true;
        $JSON["message"] = "No existeix el usuari";
    }
}
echo json_encode($JSON);