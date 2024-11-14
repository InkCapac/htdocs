<!--Usar después el código-->
<?php
//Hace un rollback al estado inicial
session_start(); //$_SESSION["nombre"] = "maria";
$_SESSION["nombre"] = "pepe";
session_abort();
?>

<?php
//Borra la sesion y hace logout
session_start(); //$_SESSION["nombre"] = "maria";
$_SESSION["nombre"] = "pepe";
$_SESSION = [];
session_destroy();