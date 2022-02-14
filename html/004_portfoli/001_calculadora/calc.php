<?php
require_once("../header.php")
?>
<!DOCTYPE html>
<html lang="ca">
  <head>
    <meta charset="UTF-8">
    <title>Activitat 3 - Operacions amb 2 nombres</title>
    <link rel="stylesheet" href="RieraPau_act_001.css">
  </head>
  <body>
        <div>
            Nombre 1: <input type="text" id="primerNombre"><br>
            Nombre 2: <input type="text" id="segonNombre"><br>
            <button onclick="suma()">Suma</button>
            <button onclick="resta()">Resta</button>
            <button onclick="producte()">Producte</button>
            <button onclick="divisio()">Divisió</button>
            <p>Resutat :
            <span id="resultat"></span>
            </p>
        </div>
    <script type="text/javascript" src="RieraPau_act_001.js"></script>
  </body>
</html>