<?php
function recollirdades($nomcamp){
    return isset($_POST[$nomcamp])?$_POST[$nomcamp]:"";
}
function rng($min,$max){
    return rand($min,$max);
}
function colodaws($daws,$color,$array){
    for ($i=0; $i < $daws; $i++) { 
        if($array["col"][$i]==$color){
            echo '<img src="img/'.$array["num"][$i].'.svg" alt="'.$array["num"][$i].'" style="border: solid ';
            if($array["col"][$i]==1){
                echo 'blue;">';
            }else {
                echo 'red;">';
            }
        }
    }
}
?>