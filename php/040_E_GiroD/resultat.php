<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="css/estils.css">

</head>

<body>
<div class="ejf giro">
  <?php
    require_once("inc/config.inc");
    require_once("inc/funcions.inc");
    include("inc/capcalera.inc");

   ?>

      <div class="contenido">

        <?php
           if ($_GET["r"] == "ok"){
                echo "Afegit correctament";
           }else{
               echo "No s'ha afegit correctament";
           }
         ?>
         <a href="./index.php">Inici</a>
    </div>
    <?php
      include("inc/peu.inc");
     ?>
    </div>
</body>
</html>
