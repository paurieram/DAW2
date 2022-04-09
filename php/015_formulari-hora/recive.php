<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>014</title>
</head>
<body>
    <h1>DADES REBUDES</h1>
    <?php
    $resultat = isset($_GET["resultat"])?$_GET["resultat"]:"";
    echo "Dades enviades ".$nom." i ".$cognom." ";
    if($resultat == "OK"){
        echo "Enviament Correcte";
    }else if($resultat == "KO"){
        echo "Enviament Erroni";
    }
    ?>
</body>
</html>