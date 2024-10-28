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
$productos = $conexion->recibir_datos("SELECT * FROM catalogo LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konami Code</title>
    <link rel="shortcut icon" href="https://www.shareicon.net/download/2015/08/20/87888_dragon-ball.ico" type="image/x-icon">
    <!--Font del texto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Archivos css -->
    <link rel="stylesheet" href="./css_store/index_store.css">
    <link rel="stylesheet" href="./css_store/catalogue_store.css">
    <link rel="stylesheet" href="./css_store/gallery_store.css">
    <link rel="stylesheet" href="./css_store/index_store.css">
    <link rel="stylesheet" href="./css_store/navbar_store.css">
</head>

<body>
    <!-- Barra de navegación de la página web-->
    <div class="navbar">
        <a href="#inicio-index">RedRibbon</a>
        <a href="./products.php">Productos</a>
        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Red_Ribbon_Army_Logo.png"
                alt="RedRoom" class="navbar-imagen"></a>
        <a href="">Partners</a>
        <a href="">Events</a>
    </div>

    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="https://easycdn.es/1/imagenes/articulos_337745.png" data-index="1">
            <img class="gallery-item" src="https://blog.es.playstation.com/tachyon/sites/14/2023/09/6087d4b0644c916a7562b5c35569d8a70d3ca330.jpg" data-index="2">
            <img class="gallery-item" src="https://i.ytimg.com/vi/p6-MsytRGTE/maxresdefault.jpg" data-index="3">
            <img class="gallery-item" src="https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/11/playstation-studios-fan-requested-remake.jpg" data-index="4">
            <img class="gallery-item" src="https://i.rtings.com/assets/pages/EEgK6vzi/best-ps5-monitors-20230824-medium.jpg?format=auto" data-index="5">
        </div>
    </div>
    <!-- Botones de la galería de imágenes -->
    <div class="nav-buttons">
        <button style="font-family: arcade;" class="nav-button" id="prevButton">Anterior</button>
        <button style="font-family: arcade" class="nav-button" id="nextButton">Adelante</button>
    </div>
    <h1 id="inicio-index" class="parrafo-1">
        <p>Pick up the videogame you most like!</p>
    </h1>

    <!-- Catálogo productos -->
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $producto_id = $productos[$i]["id"]; // Obtén el id del producto desde la base de datos
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    echo '
        <article id="producto' . $producto_id . '"> <!-- Usa el id del producto en el id del article -->
            <h3>' . $nombre . '</h3>
            <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
            <p class="description-style">' . $descripcion . '</p>
            <p>' . $precio . '</p>
            <button class="adquirir-btn" data-id="' . $producto_id . '">Adquirir</button>
        </article>';
                }
            }
            ?>
        </section>
    </main>
    <button id="vaciarCarrito" class="vaciar-button">Vaciar Carrito</button>

    <!-- Archivos JavaScript -->
    <script src="./js_store/gallery_store.js"></script>
    <script src="./js_store/navbar_store.js"></script>
    <script src="./js_store/carrito_store.js"></script>
    <footer></footer>
    <div class="hamburguesa">
        -<br>-<br>-
    </div>
</body>

</html>