<?php

// encara no esta enllestit però farem que funcioni per enviar el formulari de la finestra modal
    $alumnes = array();

    $alumnesCursa[0] = array("Nom" => "Juan Antonio","Cognom" => "Tirillas");
    $alumnesCursa[1] = array("Nom" => "Eustakio","Cognom" => "ConK");
    $alumnesCursa[2] = array("Nom" => "Joel","Cognom" => "Berrocal");

    $cursa = isset($_POST["valgrp"])?$_POST["valgrp"]:"";


    if($cursa ==""){
        echo "Error inesperat!!";
        exit();
    }else{
        $arrayseleccionat = array();
        if ($cursa =="1"){
            $arrayseleccionat = $alumnesCursa;
        }else{
            echo "No tenim aquest grup d'alumnes!";
            exit();
        }
                echo "<TABLE border=1><tr><td>Nom</td><td>Cognom</td></tr>";

                foreach ($arrayseleccionat as $key => $value) {
                    echo "<tr><td>".$value["Nom"]."</td><td>".$value["Cognom"]."</td></tr>";
                }
                echo "</TABLE>";
                exit();
            }   
?>

