<?php
//Aquí volvemos a transformar el texto en JSON
$datos = json_decode(file_get_contents("php://input"), true);
echo "Paco dice:".$datos["mensaje"];
?>