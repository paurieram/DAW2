<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("model/cotxe.php");
require("service/CotxeData.php");
require("controller/CotxeController.php");

/* Creating a new instance of the CotxeController class. */
$controller = new CotxeController;

if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != ""){
    $route = explode("/", $_SERVER['QUERY_STRING']);
    if ($route[0]=="view"){
        $controller->viewcar($route[1]);
    }else if($route[0]=="modificar"){
        if (isset($_POST["brand"])){
            $controller->UpdateCotxe($route[1],$_POST);
        }else{
            $controller->formUpdateCotxe($route[1]);
        }
    }
}else{
    /* Calling the index method of the CotxeController class. */
    $controller->index(); 
}