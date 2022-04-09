<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>028</title>
</head>
<body>
    <h1>El jugador <?=$_SESSION["nomj"]?> ha aconseguit completar <?=$_SESSION["cares"]?> cares en <?=$_SESSION["maxtirades"]?> tirades</h1>
</body>
</html>