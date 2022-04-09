<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INSERT BBDD</h1>
    <form action="dadesbbdd.php?operacio=1" method="post">
        Nom: <input type="text" name="nom" value="">
        Cognom: <input type="text" name="cognom" value="">
        <input type="submit" value="Guradat">
    </form>
    <h1>SELECT BBDD</h1>
    <a href="dadesbbdd.php?operacio=2">Mostrar</a>
</body>
</html>