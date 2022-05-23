<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            width: 8rem;
            text-align: left;
            border-bottom: 1px solid black;
        }
        td{
            width: 8rem;
        }
    </style>
</head>
<body>
    <h1>Informacion del cotxe</h1>
    <form action="" method="post">
        <label for="brand">Marca</label>
        <input type="text" name="brand" value="<?=$row->getMarca()?>" readonly><br>
        <label for="model">Model</label>
        <input type="text" name="model" value="<?=$row->getModel()?>" readonly><br>
        <label for="color">Color</label>
        <input type="text" name="color" value="<?=$row->getColor()?>" readonly><br>
        <label for="owner">Propietari</label>
        <input type="text" name="owner" value="<?=$row->getPropietari()?>" readonly><br>
        <a href="index.php">Enrere</a>
    </form>
</body>
</html>