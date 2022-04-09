<?php
session_start();
unset($_SESSION["nomj"]);
unset($_SESSION["maxtirades"]);
unset($_SESSION["tirades"]);
unset($_SESSION["imatges"]);
unset($_SESSION["end"]);
unset($_SESSION["cares"]);
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
    <form action="game.php" method="post">
        Nom: <input type="text" name="nom" required><br>
        Tirades: <input type="text" name="maxtirades" required><br>
        <input type="submit" value="Jugar">
    </form>
</body>
</html>