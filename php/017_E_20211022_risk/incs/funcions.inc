<?php
    function rng($d){
        for ($i=0; $i < $d; $i++) { 
            $res[$i]=rand(1,6);
        }
        return $res;
    }
    function res($arrayf){
        for ($i=0; $i < 3; $i++) { 
            if(isset($arrayf[0][$i]) && isset($arrayf[1][$i])){
                if($arrayf[0][$i] > $arrayf[1][$i]){
                    $arrayres[1]++;
                }else if($arrayf[0][$i] <= $arrayf[1][$i]){
                    $arrayres[0]++;
                }
            }
        }
        if($arrayres[0]==null){
            $arrayres[0]=0;
        }
        if($arrayres[1]==null){
            $arrayres[1]=0;
        }
        return $arrayres;
    }
    function show($a,$d){
        echo "<p>L'atacant perd ".$a." unitats. El defensor perd ".$d." unitats.</p>";
    }
?>