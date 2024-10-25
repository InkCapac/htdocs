<?php
/*Creado el 25-10 (corregir)*/
include_once("conectar.php");
    $pepe = new Conectar();
    $pepe->hacer_consulta("INSERT INTO usuario VALUES (?,?), 'is', [$id, $nombre]");

    $datos = $pepe->recibir_datos("SELECT * FROM usuarios");
    Validar::longitud();

    for($i=0,$i<count($datos),$i++){
        echo "<h1>".$datos[$i]["nombre"]."</h1>";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>