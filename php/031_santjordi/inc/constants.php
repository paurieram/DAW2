<?php

// BBDD
define("_SERVIDORBBDD","localhost");
define("_USERBBDD","usersantjordi");
define("_PASSWDBBDD","Li7m6oQu");
define("_NOMBBDD","dbSantJordi");
define("_TABLEUSUARIS","usuari");
define("_TABLECATEGORIES","categoria");
define("_TABLEVOTACIO","votacio");
define("_TABLEOBRA","obra");
// LON RAND PASS
define("_LONGPASS",10);
// ADMIN USER
define("_USUARIADMIN","informaticaescola@ginebro.cat");
define("_PASSWORDADMIN",hash('sha256', "D@W22022"));
// PHPMAILER
define("_HOSTMAIL", "smtp.gmail.com");
define("_USERMAIL", "rubenrecolons2001@ginebro.cat");
define("_PASSMAIL", "Daw22021"); // Ivan hem cambiat la contrasenya potser no es aquesta
// VOTES AND OBRES
define("_VOTES", 10);// vots per categoria
define("_OBRES", 999);// obres per persona
define("_GUANYADORS", 3); // max 9
define("_SELFVOTE", false); // false = no permet votar-se a si mateix
define("_VOTE", true); // false = no permet votar

?>