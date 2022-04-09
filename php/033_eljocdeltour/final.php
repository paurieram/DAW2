<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Quiz de ciclisme</title>
</head>
<body>
    <H2>Has acavat, has encertat <?=$_SESSION['pts']?></H2>
    <a class="btn btn-secondary" href="index.php">inici</a>
    <a class="btn btn-secondary" href="redirects/reset.php">reiniciar punts</a>
</body>
</html>
<?php
      require_once("inc/constant.inc");

?>