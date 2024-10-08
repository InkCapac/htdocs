<?php

include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "diseno";
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$footer = 3;
$header = 3;
$contenedor = 3;

$datos = $conexion->hacer_consulta("INSERT INTO pagina (footer, header, contenedor) VALUES (?, ?, ?)","iii",[$footer,$header,$contenedor]);
?>