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
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        <p class="paragraph1-destinos">Los lugares emblemáticos de Perú, como Machu Picchu, la vibrante Montaña del Arco
            Iris y las misteriosas
            Líneas de Nazca,
            ofrecen una impresionante mezcla de belleza natural e historia antigua. Desde las cumbres andinas hasta la
            selva
            selva amazónica, estos lugares muestran la diversidad paisajística y el rico patrimonio cultural del país.
            destino obligado para los viajeros.
        </p>

        <!--Sección de contenidos-->
        <div class="content">
            <div class="grid">
                <!-- Row 1: Image on the right -->
                <div class="image-text-row image-right">
                    <p>**Machu Picchu**, la antigua ciudadela inca situada en lo alto de los Andes, es uno de los
                        yacimientos arqueológicos más emblemáticos del mundo. Sus notables estructuras de piedra,
                        terrazas y templos reflejan el ingenio y la maestría arquitectónica de la civilización inca.
                        Rodeado de exuberantes montañas y niebla, Machu Picchu sigue siendo un símbolo del rico
                        patrimonio cultural de Perú, ofreciendo a los visitantes una profunda visión del pasado y una de
                        las vistas más impresionantes del mundo.</p>
                    <img class="image-section" src="https://live.staticflickr.com/5646/30232917794_7705b04d68_h.jpg"
                        alt="Machu Picchu">
                </div>
                <!-- Row 2: Image on the left -->
                <div class="image-text-row image-left">
                    <img class="image-section"
                        src="https://media.istockphoto.com/id/1442409650/photo/colorful-scenery-in-peru.jpg?s=612x612&w=0&k=20&c=XPIQVZcA1AnctO5WNqcdooZQ1hBxP3ACvKQNsnnddSg="
                        alt="Montaña de siete colores">
                    <p>**La Montaña del Arco Iris (Vinicunca)** es una maravilla natural de los Andes peruanos, famosa
                        por sus laderas multicolores que crean un espectáculo visual impresionante. Formada por
                        depósitos minerales únicos, la montaña muestra sorprendentes capas de tonos rojos, amarillos,
                        verdes y azules. A más de 5.000 metros de altura, la Montaña Arco Iris ofrece a los viajeros
                        aventureros no sólo un paisaje impresionante, sino también una conexión más profunda con la
                        belleza y las maravillas geológicas de las tierras altas de Perú.</p>
                </div>
                <!-- Row 3: Image on the right -->
                <div class="image-text-row image-right">
                    <p>**Huacachina**, un oasis en el corazón del desierto peruano, es una joya escondida rodeada de
                        imponentes dunas de arena. Este pintoresco destino es conocido por su tranquila laguna, sus
                        palmeras y sus espectaculares paisajes. Huacachina ofrece a los visitantes una mezcla única de
                        relax y aventura, desde practicar sandboard y dar paseos en buggy hasta disfrutar de la apacible
                        belleza del oasis. Constituye un impresionante testimonio de la diversidad natural de Perú y
                        ofrece una experiencia inolvidable en el desierto.</p>
                    <img class="image-section"
                        src="https://media.istockphoto.com/id/547521820/photo/oasis-huachina-village-in-peru.jpg?s=612x612&w=0&k=20&c=CZOrLpW2-aaboFM5zrL6xVigrWCxGXR3rFWjmmm1_Dw="
                        alt="Desierto de la Huacachina">
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
        <footer>
            <!--Símbolos de redes sociales-->
            <div class="footerContainer">
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google-plus"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
                <p class="footer-p">© 2024 Visit Peru All rights reserved.</p>

        </footer>
    </body>

</html>