<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="redirect.php" method="post">
        <input type="text" name="usr">
        <input type="text" name="pas">
        <input type="submit" value="Entrar">
        <span><?=$_SESSION["err"]?></span>
    </form>
</body>
</html>
<?php
$_SESSION["err"] = "";
?>