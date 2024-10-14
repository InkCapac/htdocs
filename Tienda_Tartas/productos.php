<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "tienda";
if (isset($_GET["pagina"])) {
    $pagina = (($_GET["pagina"]) - 1) * 12;
} else {
    $pagina = 0;
}
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$productos = $conexion->recibir_datos("SELECT * FROM tartas LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Productos</title>
    <!--Fuentes-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!--Archivos .css-->
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_main.css">
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_catalogo.css">

</head>

<body>
    <header>
        <div class="grid logo">
            <img src="./tienda_tartas_images/cake_average.png" alt="This is L4M3">
        </div>
        <nav class="grid cinco">
            <a href="./tartas.php">Inicio</a>
            <a href="./productos.php">Productos</a>
            <a href="./preguntas.php">Preguntas frecuentes</a>
            <a href="">Contacto</a>
        </nav>
    </header>
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $id = $productos[$i]["id"];
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    $alergenos = $productos[$i]["alergenos"];
                    echo '
                <article class="product-layout">
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                    <p>' . $alergenos .  '</p>
                    <a href= "productos.php?id=' . $id . '"><button>Adquirir</button><a>
                </article>';
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>© Zarif Kamiso 2024 All rights reserved</p>
    </footer>
</body>

</html>