<?php

...

DATOS DE LA BASE DE DATOS

include_once("conectar.php");

$conexion = new Conectar(datos);
$nombre = $_POST["nombre"];
$password = hash('crc32b', $_POST["password"]);

$conexion->enviar_datos("INSERT INTO usuarios (nombre, password) VALUES (?,?)", "ss",[$nombre, $password]);
