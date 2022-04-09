<?php
function getDesplegable($nom,$id,$valors){
    $return = "<SELECT name='".$nom."' id='".$id."'>";
    foreach($valors as $key => $valor){
        $return .= "<option value='".$key."'>".$valor."</option>";
    }
    $return .="</SELECT>";
    return $return;
}
function recollirdades($nomcamp){
    return isset($_POST[$nomcamp])?$_POST[$nomcamp]:"";
}
?>