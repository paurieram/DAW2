<?php

    $grup = isset($_POST["valgrp"])?$_POST["valgrp"]:"";

    if($grup ==""){
        echo "Error inesperat!!";
        exit();
    }else{
        $arrayseleccionat = array();
        if ($grup == "1"){
            $arrayseleccionat = $alumnesPrebenjamí;
        }else if ($grup =="2"){
            $arrayseleccionat = $alumnesBenjamí;    
        }else if ($grup =="3"){
            $arrayseleccionat = $alumnesAleví;
        }else if ($grup =="4"){
            $arrayseleccionat = $alumnesInfantil;
        }else if ($grup =="5"){
            $arrayseleccionat = $alumnesCadet;
        }else if ($grup =="6"){
            $arrayseleccionat = $alumnesJuvenil;
        }else if ($grup =="7"){
            $arrayseleccionat = $Exalumnes;
        }else if ($grup =="8"){
            $arrayseleccionat = $ParesMares;
        }else{
            echo "No tenim aquest grup d'alumnes!";
            exit();
        }
        echo "<table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>Posició</th>
                <th scope='col'>Nom/Cognom</th>
                <th scope='col'>Temps</th>
            </tr>
        </thead>";

        foreach ($arrayseleccionat as $key => $value) {
            echo "<tr>
                <th scope='row'>".$value["Posició"]."</th>
                <td>".$value["Nom/Cognom"]."</td>
                <td>".$value["Temps"]."</td>
            </tr>";
        }
        echo "</table>";
        exit();
    }
?>


