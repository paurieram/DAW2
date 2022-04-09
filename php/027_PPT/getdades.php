<?php
session_start();
function recollirdades($nomcamp){
    return isset($_POST[$nomcamp])?$_POST[$nomcamp]:"";
}
$simbols[0] = [3,0,1,0,1];//piedra
$simbols[1] = [1,3,0,1,0];//papel
$simbols[2] = [0,1,3,0,1];//tijera
$simbols[3] = [1,0,1,3,0];//spock
$simbols[4] = [0,1,0,1,3];//lagarto
if (!isset($_SESSION["tirades"])){
    $_SESSION["tirades"] = recollirdades("tirades");
}
if (!isset($_SESSION["tirada"])){
    $_SESSION["tirada"] = 1;
    $tirada = [rand(0,4),rand(0,4)];
}else if ($_SESSION["tirada"]<$_SESSION["tirades"]){
    $_SESSION["tirada"] += 1;
    $tirada = [rand(0,4),rand(0,4)];
}
if (!isset($_SESSION["j1"])){
    $_SESSION["j1"] = recollirdades("j1");
}
if (!isset($_SESSION["j2"])){
    $_SESSION["j2"] = recollirdades("j2");
}
if (!isset($_SESSION["j1p"])){
    $_SESSION["j1p"]=0;
}
if (!isset($_SESSION["j2p"])){
    $_SESSION["j2p"]=0;
}
?>
<h2><?=$_SESSION["tirada"]?>/<?=$_SESSION["tirades"]?></h2>
<?php
if ($_SESSION["tirada"]<$_SESSION["tirades"]){
    ?>
    <h2><?=$_SESSION['j1']?> amb <?=$_SESSION["j1p"]?> punts</h2>
    <?php
    echo '<img src="./img/'.$tirada[0].'.jpg" alt=""><br>';
    ?>
    <h2><?=$_SESSION['j2']?> amb <?=$_SESSION["j2p"]?> punts</h2>
    <?php
    echo '<img src="./img/'.$tirada[1].'.jpg" alt=""><br>';
    if (isset($tirada)){
        if ($simbols[$tirada[0]][$tirada[1]]==0){
            $_SESSION["j2p"]+=1;
            $num=1;
            if (isset($_SESSION["win"])){
                if ($_SESSION["win"]=="p2"){
                    $_SESSION["j2p"]+=1;
                    $num+=1;
                }
            }
            $_SESSION["win"]="p2";
            echo "<h1>Guanya el ".$_SESSION["j2"]." amb +".$num." punts</h1>";
        }elseif ($simbols[$tirada[0]][$tirada[1]]==1) {
            $_SESSION["j1p"]+=1;
            $num=1;
            if (isset($_SESSION["win"])){
                if ($_SESSION["win"]=="p1"){
                    $_SESSION["j1p"]+=1;
                    $num+=1;
                }
            }
            $_SESSION["win"]="p1";
            echo "<h1>Guanya el ".$_SESSION["j1"]." amb +".$num." punts</h1>";
        }elseif ($simbols[$tirada[0]][$tirada[1]]==3) {
            echo "<h1>Empat</h1>";
            $_SESSION["empats"]+=1;
        };
    }
}else{
    if ($_SESSION["j2p"]>$_SESSION["j1p"]){
        echo "<h2>Ha guanyat el ".$_SESSION["j2"]." amb ".$_SESSION["j2p"]." punts, vs ".$_SESSION["j1p"]." del ".$_SESSION["j1"]."</h2>";
    }elseif ($_SESSION["j2p"]<$_SESSION["j1p"]) {
        echo "<h2>Ha guanyat el ".$_SESSION["j1"]." amb ".$_SESSION["j1p"]." punts, vs ".$_SESSION["j2p"]." del ".$_SESSION["j2"]."</h2>";
    }elseif ($_SESSION["j2p"]==$_SESSION["j1p"]) {
        echo "<h2>Ha sigut un empat</h2>";
    }
}
?>
<a href="getdades.php">Continuar Jugant</a> | 
<a href="reiniciar.php">Reiniciar</a> | 
<a href="tancarsesio.php">Tornar A Començar</a>