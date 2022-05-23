<?php
if (isset($message)){
    echo $message;
    echo "<a href='index.php'>Enrere</a>";
}else{
?>
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
    <form action="index.php?modificar/<?=$row->getId()?>" method="post">
        <label for="brand">Marca</label>
        <input type="text" name="brand" value="<?=$row->getMarca()?>"><br>
        <label for="model">Model</label>
        <input type="text" name="model" value="<?=$row->getModel()?>"><br>
        <label for="color">Color</label>
        <input type="text" name="color" value="<?=$row->getColor()?>"><br>
        <label for="owner">Propietari</label>
        <input type="text" name="owner" value="<?=$row->getPropietari()?>"><br>
        <input type="submit" value="Modificar">
        <a href="index.php">Enrere</a>  
    </form>
</body>
</html>
<?php
}