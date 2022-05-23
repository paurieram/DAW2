<?php 
$JSON["text"] = "Nom:".isset($_REQUEST["name"])?$_REQUEST["name"]:"No s'ha rebut nom";
$JSON["text"] .= "Mail:".isset($_REQUEST["email"])?$_REQUEST["email"]:"No s'ha rebut email";
echo json_encode($JSON);