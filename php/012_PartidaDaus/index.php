<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>012</title>
</head>
<body>
    <?php
    $daws=rand(2,7);
    for($i=0;$i<$daws;$i++){
        $array["J1"][$i]=rand(1,6);
    }
    for($i=0;$i<$daws;$i++){
        $array["J2"][$i]=rand(1,6);
    }
    echo "<h2>Jugador1</h2>";
    for($i=0;$i<$daws;$i++){
        echo "<img src='img/".$array["J1"][$i].".svg'>";
    }
    echo "<h2>Jugador2</h2>";
    for($i=0;$i<$daws;$i++){
        echo "<img src='img/".$array["J2"][$i].".svg'>";
    }
    $Jugador1=0;
    $Jugador2=0;
    $Empat=0;
    $Guanyador="";
    for($i=0;$i<$daws;$i++){
        if($array["J1"][$i]<$array["J2"][$i]){
            $Jugador2++;
        }else if($array["J1"][$i]>$array["J2"][$i]){
            $Jugador1++;
        }else if($array["J1"][$i]==$array["J2"][$i]){
            $Empat++;
        }
    }
    echo "<h2>Partides Guanyades Jugador1: ".$Jugador1."</h2>";
    echo "<h2>Partides Guanyades Jugador2: ".$Jugador2."</h2>";
    echo "<h2>Partides Empatades: ".$Empat."</h2>";
    if($Jugador2<$Jugador1){
       $Guanyador="El Guañador es: Jugador1";
    }else if($Jugador2>$Jugador1){
        $Guanyador="El Guañador es: Jugador2";
    }else if($Jugador2==$Jugador1){
        $Guanyador="No Ha guanyat nungú";
    }
    echo "<h2>$Guanyador</h2>";

    ?>
</body>
</html>