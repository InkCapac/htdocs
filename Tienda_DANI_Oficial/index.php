<!--Traducir todo al español después, incluida la base de datos-->
<!--
    BASE DE DATOS: tienda
    TABLA: catalogo
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
        <a href="./index.html">RedRibbon</a>
        <a href="./destinos.html">Productos</a>
        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Red_Ribbon_Army_Logo.png"
                alt="RedRoom" class="navbar-imagen"></a>
        <a href="#inicio-gastronomia">Partners</a>
        <a href="./festivales.html">Events</a>
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
    <h1 class="parrafo-1">
        <p>Pick up the videogame you most like!</p>
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
            }
            ?>
        </section>
    </main>

    <!-- Archivos JavaScript -->
    <script src="./js_store/gallery_store.js"></script>
    <script src="./js_store/navbar_store.js"></script>
    <footer></footer>
    <div class="hamburguesa">
        -<br>-<br>-
    </div>
</body>

</html>