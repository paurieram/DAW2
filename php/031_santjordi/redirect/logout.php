<?php
session_start();
if (isset($_SESSION["log"])){
    session_destroy();
}
header('Location: ../index.php');
?>