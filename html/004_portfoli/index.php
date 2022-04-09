<?php
session_start();
if ($_SESSION["USER"] != "LOGGED"){
    header("Location: login.php");
}else{

?>
<?=include("header.php");?>
<?=include("nav.php");?>
<body> 

</body>
</html>
<?php
}
?>