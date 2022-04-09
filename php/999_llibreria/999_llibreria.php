<?php
//debug
error_reporting(E_ALL);
ini_set('display_errors','1');
//mostrar tot
print_r($dades);
//destruir
unset($dades);
//-------------------------------Declaracio
//array
$array = ["0","1","2","3"];
//matriu
$matriu = array(array("0","1"),array("2","3"));
//arrays asociatius (nom)
$dades["nom"]="ivan";
//arrays asociatius (nom + nombres)
$dades[0]["nom"]="ivan";
//-------------------------------
//length
echo count($array);
$sql = "SELECT name FROM table t1 INNER JOIN table2 t2 ON t1.id = t2.id";







































?>