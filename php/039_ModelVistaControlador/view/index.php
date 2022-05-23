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
    <h1>Listado de cotxes</h1>
    <table>
        <tr>
            <th>Marca</th>
            <th>Model</th>
            <th>Color</th>
            <th>Propietari</th>
            <th>Informacio</th>
            <th>Editar</th>
        </tr>
        <?php foreach ($rowset as $row){ ?>
            <tr>
                <td><?=$row->getMarca()?></td>
                <td><?=$row->getModel()?></td>
                <td><?=$row->getColor()?></td>
                <td><?=$row->getPropietari()?></td>
                <td><a href="index.php?view/<?=$row->getId()?>">Veure</a></td>
                <td><a href="index.php?modificar/<?=$row->getId()?>">Editar</a></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>