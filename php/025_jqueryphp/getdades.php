<?php
$alumnesg1[0]=array("Nom"=>"tonto","Cognom"=>"delculo");
$alumnesg1[1]=array("Nom"=>"saoji","Cognom"=>"2");
$alumnesg1[2]=array("Nom"=>"mis","Cognom"=>"co");

$alumnesg2[0]=array("Nom"=>"soy","Cognom"=>"loko");
$alumnesg2[1]=array("Nom"=>"maria","Cognom"=>"tonta");
$alumnesg2[2]=array("Nom"=>"los","Cognom"=>"ca");

$alumnesg3[0]=array("Nom"=>"aosi","Cognom"=>"najks");
$alumnesg3[1]=array("Nom"=>"sry","Cognom"=>"srytf");
$alumnesg3[2]=array("Nom"=>"verdf","Cognom"=>"vsth");

$grup = isset($_POST["grp"])?$_POST["grp"]:"";

if ($grup==""){
    echo "<h1>Error Inerperat</h1>";
    exit();
}else{
    $selec=array();
    if ($grup=="1"){
        $selec=$alumnesg1;
    }elseif($grup=="2"){
        $selec=$alumnesg2;
    }elseif($grup=="3"){
        $selec=$alumnesg3;
    }else{
        echo "<h1>El grup de alumnes no exiteix</h1>";
        exit();
    }
    echo '<table border="1"><tr><td>Nom</td><td>Cognom</td></tr>';
    foreach ($selec as $key => $value){
        echo '<tr><td>'.$value["Nom"].'</td><td>'.$value["Cognom"].'</td></tr>';
    }
    echo '</table>';
}   









?>