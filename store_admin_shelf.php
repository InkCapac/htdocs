<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "diseno";
if (isset($_POST["tipo"])) {
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $id_cont = 1;
    $contenedor = $_POST["tipo"];
    $prioridad = $_POST["prioridad"];
    $texto = $_POST["texto"];
    $imagen = $_POST["imagen"];
    $titulo = $_POST["titulo"];

    $conexion->hacer_consulta("INSERT INTO catalogo (id_item, nombre_item, descripcion_item, precio_item) VALUES (?,?,?,?,?)", "iissi", [$id_item, $nombre_item, $descripcion_item, $precio_item]);
}
?>
<!---->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Ingresar productos</title>
    <link rel="stylesheet" href="./store_css/store_sell.css">
</head>

<body>
    <main class="cabecera">
        <div class="grid grid-25-75">
            <h1>Datos del producto</h1>
            <form action="./store_admin_shelf.php" method="post"></form>
            <div class="grid grid-50">
                <p>Id del item<span class="star">*</span></p>
                <select id="id_item">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
                <p>Nombre Item<span class="star">*</span></p>
                <input type="text" name="nombre_item" id="">
                <p>Descripción del item<span class="star">*</span></p>
                <textarea name="texto" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div>
            <button class="boton">Siguiente</button>
        </div>
    </main>

</body>

</html>