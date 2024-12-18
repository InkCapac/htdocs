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
?>

<?php
session_start(); // Start the session to access session variables

// Check for message and display it if exists
if (isset($_SESSION['message'])) {
    echo '<div class="notification">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Clear the message after displaying
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Tienda de tartas artesanales</title>
    <link rel="shortcut icon"
        href="https://static.wixstatic.com/media/aac7c7_2d43f156b81a4898b84dd5794e9e3041~mv2.png/v1/fill/w_104,h_99,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/zk1.png"
        type="image/x-icon">
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
    <!--Galería de imágenes-->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active"
                src="https://www.dukeshill.co.uk/cdn/shop/products/140459_SELPAT-Dukeshill-Montmartre-Tea-Pastries-26May2.jpg?v=1690310936"
                data-index="1">
            <img class="gallery-item"
                src="https://scontent-dfw5-1.cdninstagram.com/v/t51.29350-15/462739893_1064478251991679_8898495219470500494_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=18de74&_nc_ohc=Cm5p0oxIpKMQ7kNvgF2geAl&_nc_ht=scontent-dfw5-1.cdninstagram.com&edm=AL-3X8kEAAAA&_nc_gid=Az03C-sb8vWphtKqwRLQGpM&oh=00_AYCuU9i2HMGfQPgAOyP0lXk50PJqPblS9DEM-18diOZmwA&oe=6715E2F1"
                data-index="2">
            <img class="gallery-item" src="https://i.ytimg.com/vi/ZWk3bXSDVK8/maxresdefault.jpg" data-index="3">
            <img class="gallery-item"
                src="https://www.hdwallpapers.in/download/dessert_cake_raspberries_sweet_fruit_blueberry_black_currant_4k_hd-3840x2160.jpg"
                data-index="4">
        </div>
    </div>

    <!--Botones de navegación debajo de la galería-->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Siguiente</button>
    </div>

    <!--Sección de bienvenida-->
    <!--La clase 'image-placeholder' hace que la barra adquiera color-->
    <!-- Existing gallery code goes here -->

<p class="image-placeholder">
    "Las tartas son especiales. Cada cumpleaños, cada celebración termina con algo dulce,
    un pastel, y la gente lo recuerda. Lo importante son los recuerdos"
</p>

<div class="bienvenida-container">
    <p class="bienvenida-text">
        Bienvenidos a Zarif Kamiso, donde horneamos con amor y pasión para ofrecerte las mejores tartas artesanales.
        Prueba nuestras irresistibles tartas como la clásica cheesecake original, el exquisito pastel de Nutella,
        la delicada tarta de pistacho, el dulce sabor del pastel de dulce de leche, la explosión de sabor del pastel
        de Lotus, la frescura tropical de nuestra tarta de maracuyá, y la deliciosa tarta de fresa. ¡Disfruta de una
        experiencia única de sabores!
    </p>
    <img class="bienvenida-image" src="./tienda_tartas_images/zarif_kamiso.jpg" alt="Imagen Central" style="max-width: 400px;">
</div>



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