<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$array = ["0","1","2","3"];
echo "primera posició es $array[0]<br>";
echo "segona posició es $array[1]<br>";
$array[2]= "kk";
echo "tercer posició es $array[2]<br>";
echo "cuart posició es $array[3]<br>";
// echo "cinque posició es $array[4]<br>";
$matriu = array(array("0","0"),array("1","1"));
echo "primera posició es ".$matriu[0][0].", ".$matriu[0][1]."<br>";
echo "segona posició es ".$matriu[1][0].", ".$matriu[1][1]."<br>";
?>