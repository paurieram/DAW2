<?php
$alumnesG1[0]=array ("Nom" => "Tadej", "Cognom" =>"Pogacar");
$alumnesG1[1]=array ("Nom" => "Primoz", "Cognom" =>"Roglic");
$alumnesG1[2]=array ("Nom" => "Benjamin", "Cognom" =>"Martinez");

$alumnesG2[0]=array ("Nom" => "Richard", "Cognom" =>"Carapaz");
$alumnesG2[1]=array ("Nom" => "Ben", "Cognom" =>"o'conor");
$alumnesG2[2]=array ("Nom" => "enric", "Cognom" =>"mas");

$alumnesG3[0]=array ("Nom" => "Wilco", "Cognom" =>"fernadez");
$alumnesG3[1]=array ("Nom" => "Aleix", "Cognom" =>"Lutsenko");
$alumnesG3[2]=array ("Nom" => "Guiilem", "Cognom" =>"Puig");

$grup = isset($_POST["valgr"])?$_POST["valgr"]:"";
if($grup==""){
    echo "Error inegggsperat!!!";
    exit();
}else {
    if($grup==1){
        $arrayseleccoinat = $alumnesG1;
    }elseif($grup==2){
        $arrayseleccoinat = $alumnesG2;
    }elseif($grup==3){
        $arrayseleccoinat = $alumnesG3;
    }else{
        echo "No existeix aquest grup";
        exit();
    }
    echo '<table border="1"><tr><td>Nom</td><td>Cognom</td></tr>';
    foreach ($arrayseleccoinat as $key => $value){
        echo "<tr><td>".$value["Nom"]."</td><td>".$value["Cognom"]."</td></tr>";
   
    }
    echo "</table>";
    exit();
}
?>