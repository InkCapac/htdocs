<!--NOMBRE MOMENTÁNEO-->
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
if (isset($_GET["pagina"])) {
    $pagina = (($_GET["pagina"]) - 1) * 12;
} else {
    $pagina = 0;
}
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
//$productos = $conexion->recibir_datos("SELECT * FROM PRODUCTOS");
$productos = $conexion->recibir_datos("SELECT * FROM productos LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Tienda Dani</title>
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
            <!--
                if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                foreach ($productos as $producto) {
                    $nombre = $producto["nombre"];
                }

            }
            -->
            <?php
            for ($i = 0; $i < count($productos); $i++) {
                $nombre = $productos[$i]["nombre"];
                $imagen = $productos[$i]["imagen"];
                $descripcion = $productos[$i]["descripcion"];
                $precio = $productos[$i]["precio"];
                echo '
                <article>
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                </article>';
            }
            ?>
            <!--Páginas linkeadas-->
            <?php
            for ($i = 1; $i <= $paginas; $i++) {
                echo '<a href="index.php?pagina=' . $i . '">' . $i . '</a>';
            }
            for ($i = 0; $i <= $paginas; $i++) {
                echo '<a href="index.hp?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a>';
                //Manera de hacerlo manualmente:
                //<a href="index.php?pagina=1">1</a>
                //<a href="index.php?pagina=2">2</a>
            }
            ?>
            <!---->
        </section>
    </main>
    <footer></footer>
    <div class="hamburguesa">-<br>-<br>-</div>
</body>

</html>