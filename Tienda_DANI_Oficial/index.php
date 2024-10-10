<!--Traducir todo al español después, incluida la base de datos-->
<!--
    BASE DE DATOS: store
    TABLA: products
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
$bbdd = "store";
if (isset($_GET["pagina"])) {
    $pagina = (($_GET["pagina"]) - 1) * 12;
} else {
    $pagina = 0;
}
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$products = $conexion->recibir_datos("SELECT * FROM products LIMIT 12 OFFSET $pagina");
$contar_articulos = count($products);
$paginas = ($contar_articulos / 12) + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Guay</title>
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
    <!-- Botones -->
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
                for ($i = 0; $i < count($products); $i++) {
                    $name = $products[$i]["name"];
                    $image = $products[$i]["image"];
                    $description = $products[$i]["description"];
                    $price = $products[$i]["price"];
                    echo '
                <article>
                    <h3>' . $name . '</h3>
                    <img src="' . $image . '" class="product-image" alt="' . $name . '">
                    <p>' . $description . '</p>
                    <p>' . $price . '</p>
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