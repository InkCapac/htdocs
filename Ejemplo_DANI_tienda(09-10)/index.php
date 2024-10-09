<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "productos";
/*
Estructura de la base de datos para conectar a este Php:
- id int auto_increment
- nombre varchar(20)
- imagen varchar(150)
- precio double(4,2)
- descripcion varchar(250)
*/
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
if (isset($_GET["pagina"])) {
    $pagina = ($_GET("pagina") - 1) * 12;
} else {
    $pagina = 0;
}
//$productos = $conexion->recibir_datos("SELECT * FROM PRODUCTOS");
$productos = $conexion->recibir_datos("SELECT * FROM productos LIMIT 12 OFFSET 0");
$contar_articulos = count($productos);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./tienda_DANI_css/tienda_DANI.css">
</head>

<body>
    <header class="grid treinta-setenta">
        <div>
            <img src="./tienda_DANI_images/logo_nescafe.jpg" alt="Logo">
        </div>
        <nav class="grid cinco">
            <a href="">Inicio</a>
            <a href="">Ofertas</a>
            <a href="">Productos</a>
            <a href="">Sobre nosotros</a>
            <a href="">Contacto</a>
        </nav>
    </header>
    <main>
        <section class="grid una tablet-dos ordenador-tres">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                foreach ($productos as $producto) {
                    $nombre = $producto["nombre"];
                }
                for ($i = 0; $i < count($productos); $i++) {
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    echo '
                <article>
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                </article>';
                }
            } ?>
            <?php
            ?>
            <!--
<article>
                <h3>Producto1</h3>
                <img src="producto1.png" alt="Producto 1">
                <p>Producto bueno</p>
                <p>10<small>,99</small>€</p>
            </article>
            <article>
                <h3>Producto2</h3>
                <img src="producto2.png" alt="Producto 2">
                <p>Producto bueno</p>
                <p>10<small>,99</small>€</p>
            </article>
        -->

        </section>
    </main>
    <footer></footer>
    <div class="hamburguesa">-<br>-<br>-</div>
</body>

</html>