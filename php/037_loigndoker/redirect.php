<?php
session_start();
if (isset($_POST["usr"]) && isset($_POST["pas"])){
    $mysqli = new mysqli("db", "root", "example", "usuarios");
    $usr = $_POST["usr"];
    $pas = $_POST["pas"];
    $sql = "SELECT password FROM users WHERE user = '$usr'";
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['pasword'] == $pas){
            $_SESSION["usr"] = $usr;
            header("Location: sucess.php");
            exit();
        }
    }
    $_SESSION["err"] = "Login incorrecte";
    header("Location: index.php");
    exit();
}
?>