<?php 
if ($_REQUEST["name"] != ""){
    $JSON["nom"] = "Nom: ".$_REQUEST["name"];
}else{
    $JSON["nom"] = "Nom: No s'ha rebut nom";
}
if ($_REQUEST["email"] != ""){
    $JSON["mail"] = "Mail: ".$_REQUEST["email"];
}else{
    $JSON["mail"] = "Mail: No s'ha rebut email";
}
$JSON["sc"] = 1;
echo json_encode($JSON);