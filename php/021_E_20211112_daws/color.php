<?php
require_once("./incs/funcions.inc");
$blu = recollirdades("dawsb");
$red = recollirdades("dawsr");
if($blu!=""){
    $color=1;
}else{
    $color=2;
}
$daws = recollirdades("daws");
$ar = recollirdades("array1");
$arr = recollirdades("array2");
$array["num"] = explode(",",$ar);
$array["col"] = explode(",",$arr);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms Pg.3</title>
</head>
<body>
    <?php
        if($color==1){
            echo "<br><h4>Tenim ".$blu." daus blaus</h4>";
        }else{
            echo "<br><h4>Tenim ".$red." daus vermells</h4>";
        }
        colodaws($daws,$color,$array);
    ?>
</body>
</html>