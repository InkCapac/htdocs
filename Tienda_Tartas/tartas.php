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
    <title>Zarif Kamiso | Tienda de tartas artesanales</title>
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/aac7c7_2d43f156b81a4898b84dd5794e9e3041~mv2.png/v1/fill/w_104,h_99,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/zk1.png" type="image/x-icon">
    <!-- Fonts (fuentes)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!--Archivos css-->
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_galeria.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_main.css">
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_catalogo.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">
    <link rel="stylesheet" href="./tienda_tartas_css/carrito_tartas.css">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
        <!--
        <div class="grid logo">
            <img src="./tienda_tartas_images/cake_average.png" alt="This is L4M3">
        </div>
-->
<header>
    <nav class="navbar grid cinco">
        <a href="./tartas.php">Inicio</a>
        <a href="./productos.php">Productos</a>
        <a class="logo-nav" id="logoNav">
            <img src="./tienda_tartas_images/zarifKamiso.png" alt="Logo">
        </a>    
        <a href="./preguntas.php">Preguntas frecuentes</a>
        <a href="./contacto.php">Contacto</a>
    </nav>
</header>

        
        <!--Sección del formulario de la esquina-->
        <!--Formulario-->
        <div class="form-box">
            <form>
                <p>Forma parte de</p>
                <div class="grid inputs">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                <p>Información adicional</p>
                <textarea id="additional-info" name="additional_info" cols="30" rows="20"></textarea>
                <div class="grid checkbox-message">
                    <input type="checkbox" id="consent" name="consent" class="arriba">
                    <label for="consent">Por favor, haz click en este botón para asegurarnos que estás de acuerdo con
                        nuestras condiciones de servicio.</label>
                </div>
                <button type="submit">Enviar datos</button>
            </form>
            <button class="contact">Embajadores</button>
        </div>
    <!--Galería de imágenes-->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="https://www.dukeshill.co.uk/cdn/shop/products/140459_SELPAT-Dukeshill-Montmartre-Tea-Pastries-26May2.jpg?v=1690310936" data-index="1">
            <img class="gallery-item" src="https://scontent-dfw5-1.cdninstagram.com/v/t51.29350-15/462739893_1064478251991679_8898495219470500494_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=18de74&_nc_ohc=Cm5p0oxIpKMQ7kNvgF2geAl&_nc_ht=scontent-dfw5-1.cdninstagram.com&edm=AL-3X8kEAAAA&_nc_gid=Az03C-sb8vWphtKqwRLQGpM&oh=00_AYCuU9i2HMGfQPgAOyP0lXk50PJqPblS9DEM-18diOZmwA&oe=6715E2F1" data-index="2">
            <img class="gallery-item" src="https://i.ytimg.com/vi/ZWk3bXSDVK8/maxresdefault.jpg" data-index="3">
            <img class="gallery-item" src="https://www.hdwallpapers.in/download/dessert_cake_raspberries_sweet_fruit_blueberry_black_currant_4k_hd-3840x2160.jpg" data-index="4">
        </div>
    </div>

    <!--Botones de navegación debajo de la galería-->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Siguiente</button>
    </div>
    <div class="image-placeholder"></div>
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
                    <a href="productos.php?id=' . $id . '"><button>Adquirir</button></a>
                </article>';
                }
            }
            ?>
        </section>
    </main>
    <div>
        <!--Archivos JavaScript-->
        <script src="./js_tienda_tartas/galeria_tartas.js"></script>
        <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
        <script src="./js_tienda_tartas/carrito_tartas.js"></script>
    </div>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/zarifkamiso/?hl=es"><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© Zarif Kamiso 2024 All rights reserved</p>
    </footer>
</body>

</html>