<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>011</title>
</head>
<body>
    <h1>Practica 11. Fila de fitxes</h1>
    <svg width="1500" height="120" viewbox="-15 -15 1500 120" style="background-color:white; font-family:sans-serif">
    <?php
        $radi=rand(5,50);
        $num=rand(1,10);
        $t=$radi;
        for($i=0;$i<$num;$i++){
            echo "<circle cx='".$t."' cy='50' r='".$radi."' stroke='black' stroke-width='2' fill='black'></circle>";
            $t=$t+($radi*2)+5;
        }
    ?>
    </svg>
</body>
</html>