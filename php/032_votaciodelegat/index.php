<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>32</title>
</head>
<body>
    <h1>Votar Delegat</h1>
    <form action="login.php" method="post">
        <label for="usr">Correu</label><br>
        <input type="text" name="usr" id="usr"><br>
        <label for="pas">Contrasenya</label><br>
        <input type="text" name="pas" id="pas"><br>
        <button type="submit">Entrar</button>
        <span style="color: <?=$_SESSION["col"]?>;"><?=$_SESSION["err"]?></span>
    </form>
</body>
</html>
<?php
    unset($_SESSION["err"]);
    unset($_SESSION["col"]);
?>