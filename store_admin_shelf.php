<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "diseno";
if (isset($_POST["tipo"])) {
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $id_item = 1;
    $nombre_item = $_POST["nombre_item"];
    $descripcion_item = $_POST["descripcion_item"];
    $precio_item = $_POST["precio_item"];
    $imagen_item = $_POST["imagen_item"];

    $conexion->hacer_consulta("INSERT INTO catalogo (id_item, nombre_item, descripcion_item, precio_item, imagen_item) VALUES (?,?,?,?,?,?)", "iissis", [$id_item, $nombre_item, $descripcion_item, $precio_item, $imagen_item]);
}
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);

$datos = $conexion->recibir_datos("SELECT * FROM catalogo ORDER BY id_item");
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
    <!--<div class="cabecera">-->
    <div class="grid grid-25-75">
        <h1>Datos del producto</h1>
        <form action="./store_admin_shelf.php" method="post">
            <p>Id del item<span class="star">*</span></p>
            <select name="id_item">
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
            <textarea name="texto" cols="30" rows="10"></textarea>
            <p>Precio del item</p>
            <input type="number" name="precio_item">
            <p>Imagen del item</p>
            <input type="text" name="imagen_item">
            <button class="boton">Siguiente</button>
        </form>
        <?php
        if ($datos) {
            //Mostrar datos de la tabla
            foreach ($datos as $datos) {
                $nombre_item = $datos["nombre_item"];
                $descripcion_item = $datos["texto"];
                $precio_item = $datos["precio_item"];
                $imagen_item = $datos["imagen_item"];
                if ($id_item == 1) {
                    echo '<h1>' . $nombre_item . '</h1><p>' . $descripcion_item . '</p><p>' . $precio_item . '</p><img src="' . $imagen_item . '" alt="' . $nombre_item . '">';
                } elseif ($id_item == 2) {
                    echo "<h1>EL CONTENEDOR ES DE TIPO 2</h1>";
                }
            }
        } else {
            echo '<p>No hay datos disponibles</p>';
        }
        ?>
</body>

</html>