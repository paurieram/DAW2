<?php
session_start();
if (isset($_POST["usr"]) && isset($_POST["pas"])){
    $mysqli = new mysqli("localhost", "id18338919_root", "57c8HkL1jqu&6k\/", "id18338919_usuaris");
    $usr = $_POST["usr"];
    $pas = $_POST["pas"];
    $sql = "SELECT password FROM users WHERE user = '$usr'";
    $res = $mysqli->query($sql);
    while ($row=$res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['pasword'] == $pas){
            $_SESSION["usr"] = $usr;
            $_SESSION["USER"] = "LOGGED";
            header("Location: index.php");
            exit();
        }
    }
    $_SESSION["err"] = "Login incorrecte";
    header("Location: login.php");
    exit();
}
?>