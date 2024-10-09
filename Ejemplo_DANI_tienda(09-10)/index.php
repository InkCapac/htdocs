<?php
$contar_articulos = 1;
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "productos";
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$productos = $conexion->recibir_datos("SELECT * FROM PRODUCTOS");
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
                    $descripcion = "Producto bueno";
                    $precio = "10.99";
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