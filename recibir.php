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
/* EJEMPLO


$conexion->hacer_consulta("INSERT INTO usuarios (usuario, password) VALUES ('?', '?')","ss",[$usuario, $contrasena]); */

//if(Validar::longitud($observaciones, 0, 200) == false){

    /*

if (!Validar::longitud($observaciones, 0, 200)) {
    echo "Error observaciones";
    $control = false;
}
if (!Validar::defecto($tipologia)) {
    echo "Error tipologia";
    $control = false;
}
if (!Validar::defecto($provincia)) {
    echo "Error provincia";
    $control = false;
}
if (!Validar::longitud($cp, 5, 5)) {
    echo "Error codigo postal";
    $control = false;
}
if (!Validar::longitud($direccion, 1, 100)) {
    echo "Error direccion";
    $control = false;
}
if($control == true){
    echo "Conectamos a la base de datos";
}else{
    echo "Como hay errores no conectamos a la base de datos";
}
*/
?>