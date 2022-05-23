<?php 
session_start();
if ($_SESSION["LOG"]!="USER" && $_SESSION["LOG"]!="ADMIN"){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">   -->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/index.js"></script>
	<link rel="icon" type="image/png" href="img/favicon.ico"/>
	<title>Portfoli | activitats</title>
</head>
<body>
    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-10 offset-1 my-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 col-10 col-md-12 col-lg-10 offset-1 offset-md-0 offset-lg-1 g-4">
            <div class="col">
                <a href="act/001_operacions/RieraPau_act_001.html">
                    <div class="card">
                        <img src="img/operacions.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Operacions</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="act/002_rellotje/RieraPau_act_002.html">
                    <div class="card">
                        <img src="img/rellotge.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Rellotge</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="act/003_matrius i misatges/RieraPau_act_003.html">
                    <div class="card">
                        <img src="img/matrius_missatges.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Matrius i misatges</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="act/004_Puzzle/index.html">
                    <div class="card">
                        <img src="img/puzzle.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Puzzle</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="act/005_calculadora/index.html">
                    <div class="card">
                        <img src="img/calculadora.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Calculadora</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="act/006_calendari/index.html">
                    <div class="card">
                        <img src="img/calendari.PNG" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Activitat: Calendari</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>