<?php

function connectaBBDD($Servidor,$user,$passwd,$nombbdd){
    $mysqli = new mysqli($Servidor,$user,$passwd,$nombbdd);
    if(!$mysqli->connect_errno){
        $mysqli->set_charset("utf8");
    }
    return $mysqli;
}

?>