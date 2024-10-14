<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru - Destinos</title>
    <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
    <!-- Include CSS in the head -->
    <link rel="stylesheet" href="./css_linkedPages/general_navbar.css">
    <link rel="stylesheet" href="./css_linkedPages/general_gallery.css">
    <link rel="stylesheet" href="./css_linkedPages/destinos.css">
</head>

<body>
    <!--Barra de navegación de la página web-->

    <body>
        <script src="./js_files/nav_bar.js"></script>
        <div class="navbar">
            <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                    alt="Marca Perú" class="navbar-imagen"></a>
            <a href="Main page">Visit Peru </a>
            <a href="./destinos.php">Destinos</a>
            <a href="./gastronomia.php">Gastronomía</a>
            <a href="./festivales.php">Festivales</a>
        </div>
        <!--Galería de imágenes-->
        <div class="gallery">
            <div class="gallery-container">
                <img class="gallery-item active"
                    src="https://preview.redd.it/i6elkf8ugtba1.jpg?auto=webp&s=46b7f0e535e780c00b4dded90f0913316d80b24d"
                    data-index="1">
                <img class="gallery-item"
                    src="https://media.cntraveler.com/photos/6374fcbd516f47c031cea868/16:9/w_2560%2Cc_limit/Mundo%2520Mater%2520.jpg"
                    data-index="2">
                <img class="gallery-item"
                    src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/ab/cf/63/la-rosa-nautica-esta.jpg?w=1200&h=-1&s=1"
                    data-index="3">
                <img class="gallery-item" src="" data-index="4">
                <img class="gallery-item" src="" data-index="5">
                <img class="gallery-item" src="" data-index="6">
            </div>
        </div>

        <!--Botones de navegación debajo de la galería-->
        <div class="nav-buttons">
            <button class="nav-button" id="prevButton">Anterior</button>
            <button class="nav-button" id="nextButton">Siguiente</button>
        </div>

        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi aliquam magni porro voluptates in qui
            cupiditate assumenda laboriosam maxime sint. Atque earum iusto nulla nobis aliquam aspernatur commodi
            molestias
            sunt!</p>

        <!--Sección de contenidos-->
        <div class="content">
            <div class="grid">
                <!-- Row 1: Image on the right -->
                <div class="image-text-row image-right">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
                    <img class="image-section" src="./content_images/macchu_picchu.jpg" alt="Machu Picchu">
                </div>
                <!-- Row 2: Image on the left -->
                <div class="image-text-row image-left">
                    <img class="image-section" src="./content_images/peru_lake.jpg" alt="Peru Lake">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
                </div>
                <!-- Row 3: Image on the right -->
                <div class="image-text-row image-right">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
                    <img class="image-section" src="./content_images/macchu_picchu.jpg" alt="Machu Picchu">
                </div>
                <!-- Row 4: Image on the left -->
                <div class="image-text-row image-left">
                    <img class="image-section" src="./content_images/peru_lake.jpg" alt="Peru Lake">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
                </div>
                <!-- Repeat the same pattern for additional rows -->
            </div>
        </div>


        <!--Archivos JavaScript de la página-->
        <script src="./js_linkedPages/general_navbar.js"></script>
        <script src="./js_linkedPages/general_gallery.js"></script>
        <!--Pie de página-->
<footer>© 2024 Visit Peru - Destinos All rights reserved. </footer>
    </body>

</html>