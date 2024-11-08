<?php
session_start();

//Datos de la base de datos

include_once("conectar.php");

$conexion = new Conectar(datos);
$nombre = $_POST["nombre"];
$password = $_POST["password"];

$usuario = $conexion->recibir_datos("SELECT * FROM usuarios WHERE nombre = $nombre");
if($usuario no esta vacio){
    // Así está cifrado la contraseña "0x5r4g684rgd6r4grd64"
    $usuarioBBDD = $usuario[0]["password"]; 
    if (password_verify($password, $usuarioBBDD)) {
        $_SESSION["nombre"] = $usuario[0]["nombre"];
        $_SESSION["id"] = $usuario[0]["id"];
    } else {
        echo 'Invalid password.';
    }
}else{
    echo 'Error datos invalidos';
}
?>