<!--Traducir todo al español después, incluida la base de datos-->
<!--
    BASE DE DATOS: tienda
    TABLA: productos
    id int AUTO_INCREMENT
    name varchar(20);
    image varchar(100);
    price DOUBLE(4,2);
    description varchar(250);
    
-->
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
$productos = $conexion->recibir_datos("SELECT * FROM productos LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konami Code</title>
    <!-- Archivos css -->
    <link rel="stylesheet" href="./store_css/store_gallery.css">
    <link rel="stylesheet" href="./store_css/store_catalogue.css">
    <link rel="stylesheet" href="./store_css/store_main.css">
</head>

<body>
    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="./store_gallery/black_friday_deals.jpg" data-index="1">
            <img class="gallery-item" src="./store_gallery/xbox_controller.jpg" data-index="2">
            <img class="gallery-item" src="./store_gallery/store_shelves.jpg" data-index="3">
            <img class="gallery-item" src="./store_gallery/stream4k_android-pod_new.jpg" data-index="4">
            <img class="gallery-item" src="./store_gallery/videogames_catalogue.jpg" data-index="5">
        </div>
    </div>
    <!-- Botones de la galería de imágenes -->
    <div class="nav-buttons">
        <button style="font-family: arcade;" class="nav-button" id="prevButton">Anterior</button>
        <button style="font-family: arcade" class="nav-button" id="nextButton">Adelante</button>
    </div>
    <h1 class="parrafo-1" style="font-family: arcade; color: orange;">
        <p>Pick the videogame you most like!</p>
    </h1>

    <!-- Catálogo productos -->
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <!--
                <article>
                    <img style="cursor: pointer;" src="./store_images/wukong.avif" alt="Wukong">
                    <button style="font-family: arcade;">Comprar</button>
                </article>
                <article>
                    <img style="cursor: pointer;" src="./store_images/gow.avif" alt="God of War">
                    <button style="font-family: arcade;">Comprar</button>
                </article>
                <article>
                    <img style="cursor: pointer;" src="./store_images/warhammer.avif" alt="Warhammer">
                    <button style="font-family: arcade;">Comprar</button>
                </article>
            -->
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $name = $productos[$i]["nombre"];
                    $image = $productos[$i]["imagen"];
                    $description = $productos[$i]["descripcion"];
                    $price = $productos[$i]["precio"];
                    echo '
                <article>
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                </article>';
                }
            }
            ?>
        </section>
    </main>

    <!-- Archivos JavaScript -->
    <script src="./store_js/store_gallery.js"></script>
    <footer></footer>
    <div class="hamburguesa">
        -<br>-<br>-
    </div>
</body>

</html>