<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$BAIXELLS[0] = [0=>1,1=>"portaavions",2=>5];//1count/name/long
$BAIXELLS[1] = [0=>1,1=>"cuirassats",2=>4];//2
$BAIXELLS[2] = [0=>1,1=>"destructors",2=>3];//3
// $BAIXELLS[3] = [0=>2,1=>"fragates",2=>2];
// $BAIXELLS[4] = [0=>4,1=>"submarins",2=>1];

//colocar baixells matriu
if (isset($_POST["Xi"])){
    $inici = $_POST["Yi"].$_POST["Xi"];
    $fi = $_POST["Yf"].$_POST["Xf"];
    $_SESSION["pbaixells".$_SESSION['play']][$inici]=1;
    $_SESSION["pbaixells".$_SESSION['play']][$fi]=1;
    if ($_POST["Yi"] != $_POST["Yf"]){
        if ($_POST["Yi"]>$_POST["Yf"]){
            while ($_POST["Yf"]+1<$_POST["Yi"]){
                $_SESSION["pbaixells".$_SESSION['play']][($_POST["Yf"]+1).$_POST["Xi"]]=1;
                $_POST["Yf"]+=1;
            }
        }else{
            while ($_POST["Yi"]+1<$_POST["Yf"]){
                $_SESSION["pbaixells".$_SESSION['play']][($_POST["Yi"]+1).$_POST["Xi"]]=1;
                $_POST["Yi"]+=1;
            }
        }
    }
    if ($_POST["Xi"] != $_POST["Xf"]){
        if ($_POST["Xi"]>$_POST["Xf"]){
            while ($_POST["Xf"]+1<$_POST["Xi"]){
                $_SESSION["pbaixells".$_SESSION['play']][$_POST["Yi"].($_POST["Xf"]+1)]=1;
                $_POST["Xf"]+=1;
            }
        }else{
            while ($_POST["Xi"]+1<$_POST["Xf"]){
                $_SESSION["pbaixells".$_SESSION['play']][$_POST["Yi"].($_POST["Xi"]+1)]=1;
                $_POST["Xi"]+=1;
            }
        }
    }
}

// if (isset($_POST["nextPlayer"])) {
//     $SESSION["switch"] = 1;
// }

if ($_SESSION["nbaix"]==2){
    $_SESSION["switch"]=1;
    $_SESSION["nbaix"]=-1;
    if (!isset($_SESSION["torn"])){
        if ($_SESSION["torn"]==2){
            $_SESSION["torn"]=1;
        }else{
            $_SESSION["torn"]=2;
        }
    }
}

if (!isset($_SESSION["play"])){//cambi jugador
    $_SESSION["play"]=1;
}else{
    if ($_SESSION["switch"]==1){
        $_SESSION["switch"]=0;
        if ($_SESSION["play"] == 1){
            $_SESSION["play"]=2;
        }else{
            $_SESSION["play"]=1;
        }
    }
}

if (!isset($_SESSION["nbaix"])){//info
    $_SESSION["nbaix"]=0;
}elseif (isset($_POST["Xi"])){
    $_SESSION["nbaix"]+=1;
}

//consolelog
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="css.css">
        <title>29</title>
    </head>
    <body>
        <a href="reset.php">Restart</a>
        <?php
    $res=0;
    foreach ($_SESSION["pbaixells".$_SESSION['play']] as $ji){
        echo $ji[$res];
        $res++;
    }
    ?>
        <form action="index.php" method="POST" id="place" style="margin-top: 5%; margin-left: 5%;">
            <b><label style="margin-left: 3%;" id="turn">Turn: jugador <?=$_SESSION['play']?></label></b><br>
            <b><label style="margin-left: 3%;" id="nomb">Colocar baixell: <?=$BAIXELLS[$_SESSION["nbaix"]][1]?></label></b><br>
            <b><label style="margin-left: 3%;" id="midab">Mida: 1x<?=$BAIXELLS[$_SESSION["nbaix"]][2]?></label></b><br style="margin-bottom: 1%;">
            <label for="Xi">Inici</label>
            <input type="text" name="Yi" id="Yi" placeholder="Y">
            <input type="text" name="Xi" id="Xi" placeholder="X"><br>
            <label for="Xf">Final</label>
            <input style="margin-top: 1%;" type="text" name="Yf" id="Yf" placeholder="Y">
            <input type="text" name="Xf" id="Xf" placeholder="X"><br>
            <?php
            if ($_SESSION["switch"]==2){
                ?>
                    <input type="submit" name="nextPlayer" value="Seguent jugador" style="margin-top: 1%;"><br>
                <?php
            }else{
                ?>
                    <input type="submit" value="Colocar" style="margin-top: 1%;"><br>
                <?php
            }
            ?>
            <span id="error" style="color: red;">ㅤ</span>
        </form>
        <table style="margin: -10% 0 0 35%">

            <caption><h2>ENFONSAR LA FLOTA</h2></caption>
            <tr>
                <th>Y</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>9</th>
            <?php
            $j = 0;
            $row = 1;
            $col = 9;
            for ($j=0,$id=0; $j < 100; $j++,$id++,$row++) { 
                if ($row==11){
                    $id=0;
                    $row=1;
                    $col-=1;
                    if ($col>=0){
                        echo "<th></th></tr><tr><th>".$col."</th>";
                    }
                }
                if ($_SESSION["pbaixells".$_SESSION['play']][$col.$id]==1){
                    echo "<td id=".$col.$id." style='background-color: #333;'></td>";
                }else{
                    echo "<td id=".$col.$id."></td>";
                }
            }
            console_log($_SESSION["pbaixells1"]);
            console_log($_SESSION["pbaixells2"]);
            ?>
                <th></th>
            </tr>
            <tr>
                <th></th>
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>X</th>
            </tr>
        </table>
    </body>
</html>