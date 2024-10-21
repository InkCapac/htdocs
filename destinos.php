<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru - Destinos</title>
    <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
    <!--Fonts para la página (Montserrat Alternates) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Include CSS in the head -->
    <!--
        <link rel="stylesheet" href="./css_linkedPages/general_infoForm.css">
    -->
    <link rel="stylesheet" href="./css_files/info_form.css">
    <link rel="stylesheet" href="./css_linkedPages/general_navbar.css">
    <link rel="stylesheet" href="./css_linkedPages/general_gallery.css">
    <link rel="stylesheet" href="./css_linkedPages/destinos.css">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Página de carga -->
    <div id="loader"></div>

    <!--Barra de navegación de la página web-->
    <div class="navbar">
        <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                alt="Marca Perú" class="navbar-imagen"></a>
        <a href="./index.php">Visit Peru </a>
        <a href="#inicio-destino"">Destinos</a>
            <a href=" ./gastronomia.php">Gastronomía</a>
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
    

    <!--Sección de destinos-->
    <p id="inicio-destino" class="parrafo1-destinos">Los lugares emblemáticos de Perú, como Machu Picchu, la
        vibrante Montaña del Arco
        Iris y las misteriosas
        Líneas de Nazca,
        ofrecen una impresionante mezcla de belleza natural e historia antigua. Desde las cumbres andinas hasta la
        selva
        selva amazónica, estos lugares muestran la diversidad paisajística y el rico patrimonio cultural del país.
        destino obligado para los viajeros.
    </p>

    <!-- Sección de contenidos -->
    <div class="contenido">
        <div class="grid">
            <!-- Fila 1: Imagen en la derecha -->
            <article class="imagen-texto-container">
                <div class="imagen-texto">
                    <p><strong>Machu Picchu</strong>, la antigua ciudadela inca situada en lo alto de los Andes, es
                        uno de los
                        yacimientos arqueológicos más emblemáticos del mundo. Sus notables estructuras de piedra,
                        terrazas y templos reflejan el ingenio y la maestría arquitectónica de la civilización inca.
                        Rodeado de exuberantes montañas y niebla, Machu Picchu sigue siendo un símbolo del rico
                        patrimonio cultural de Perú, ofreciendo a los visitantes una profunda visión del pasado y
                        una de
                        las vistas más impresionantes del mundo.</p>
                    <img src="https://live.staticflickr.com/5646/30232917794_7705b04d68_h.jpg" alt="Machu Picchu">
                </div>
            </article>
            <!-- Fila 2: Imagen a la izquierda -->
            <article class="imagen-texto-container">
                <div class="imagen-texto">
                    <img src="https://media.istockphoto.com/id/1442409650/photo/colorful-scenery-in-peru.jpg?s=612x612&w=0&k=20&c=XPIQVZcA1AnctO5WNqcdooZQ1hBxP3ACvKQNsnnddSg="
                        alt="Montaña de siete colores">
                    <p><strong>La Montaña del Arco Iris (Vinicunca)</strong> es una maravilla natural de los Andes
                        peruanos, famosa
                        por sus laderas multicolores que crean un espectáculo visual impresionante. Formada por
                        depósitos minerales únicos, la montaña muestra sorprendentes capas de tonos rojos,
                        amarillos,
                        verdes y azules. A más de 5.000 metros de altura, la Montaña Arco Iris ofrece a los viajeros
                        aventureros no sólo un paisaje impresionante, sino también una conexión más profunda con la
                        belleza y las maravillas geológicas de las tierras altas de Perú.</p>
                </div>
            </article>
            <!-- Fila 3: Imagen en la derecha -->
            <article class="imagen-texto-container">
                <div class="imagen-texto">
                    <p><strong>Huacachina</strong>, un oasis en el corazón del desierto peruano, es una joya
                        escondida rodeada de
                        imponentes dunas de arena. Este pintoresco destino es conocido por su tranquila laguna, sus
                        palmeras y sus espectaculares paisajes. Huacachina ofrece a los visitantes una mezcla única
                        de
                        relax y aventura, desde practicar sandboard y dar paseos en buggy hasta disfrutar de la
                        apacible
                        belleza del oasis. Constituye un impresionante testimonio de la diversidad natural de Perú y
                        ofrece una experiencia inolvidable en el desierto.</p>
                    <img class="image-section"
                        src="https://media.istockphoto.com/id/547521820/photo/oasis-huachina-village-in-peru.jpg?s=612x612&w=0&k=20&c=CZOrLpW2-aaboFM5zrL6xVigrWCxGXR3rFWjmmm1_Dw="
                        alt="Desierto de la Huacachina">
                </div>
            </article>
            <!-- Fila 4: Imagen a la izquierda -->
            <article class="imagen-texto-container">
                <div class="imagen-texto">
                    <img src="https://c4.wallpaperflare.com/wallpaper/995/441/303/peru-mountains-lake-cordillera-huayhuash-nature-409980-wallpaper-preview.jpg"
                        alt="Cordillera Huayhuash">
                    <p><strong>La Cordillera Huayhuash</strong> situada en los Andes peruanos, es un destino
                        impresionante
                        para los amantes de la aventura. Con sus majestuosos picos, lagos glaciares de aguas cristalinas
                        y
                        diversos ecosistemas, esta cordillera ofrece experiencias de senderismo inolvidables.
                        Mientras recorre sus desafiantes senderos, disfrute de espectaculares vistas de cumbres
                        imponentes
                        como el Siula Grande. Póngase en contacto con las comunidades locales que conservan ricas
                        tradiciones en medio del impresionante paisaje. La Cordillera Huayhuash le invita a descubrir
                        una de
                        las maravillas naturales más cautivadoras de Perú, tanto si va de excursión durante días como si
                        busca un retiro tranquilo.

                        Traducción realizada con la versión gratuita del traductor DeepL.com</p>
                </div>
            </article>
        </div>
    </div>

    <!--Contenido del formulario en la esquina-->
    <!-- Capa que cubre el contenido principal cuando se activa el formulario -->
    <div id="capa" class="capa" style="display:none;"></div>

    <!-- Botón de contacto -->
    <button style="font-family: Montserrat Alternates; font-size:x-large" class="contact">CONTÁCTANOS</button>

    <!-- Caja de formulario -->
    <div style="font-family: Montserrat Alternates" class="form-box">
        <h2>Miembros de PromPeru</h2>

        <!-- Navegación para Login y Registro -->
        <div class="form-toggle">
            <button style="font-family: Montserrat Alternates" id="login-toggle" class="active">Login</button> |
            <button style="font-family: Montserrat Alternates" id="register-toggle">Registrarse</button>
        </div>

        <!-- Formulario de inicio de sesión -->
        <form id="login-form" class="grid">
            <label for="email-login">Correo Electrónico</label>
            <input type="email" id="email-login" name="email-login" required>

            <label for="password-login">Contraseña</label>
            <input type="password" id="password-login" name="password-login" required>

            <div style="text-align:left" class="grid checkbox-message">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Recordar contraseña</label>
            </div>

            <p style="text-align:left; font-size:medium" class="forgot-password"><a href="#">Olvidaste tu contraseña?</a></p>

            <button style="font-family: Montserrat Alternates" type="submit">INGRESAR</button>
        </form>

        <!-- Formulario de registro (Inicialmente oculto) -->
        <form id="register-form" class="grid inputs" style="display:none;">
            <p style="text-align:left; font-weight:bold">Hazte miembro de PromPERÚ</p>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirmar contraseña</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <div class="grid checkbox-message">
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">Aceptar términos...</label>
            </div>

            <button style="font-family: Montserrat Alternates" type="submit">Enviar datos</button>
        </form>
    </div>


    <!--Archivos JavaScript de la página-->
    <script src="./js_linkedPages/general_navbar.js"></script>
    <script src="./js_linkedPages/general_gallery.js"></script>
    <script src="./js_linkedPages/general_infoForm.js"></script>
    <script src="./js_linkedPages/general_loadingPage.js"></script>
    <!--Pie de página-->
    <footer>
        <!--Símbolos de redes sociales-->
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/marcaPERU.lat"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/peru/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://x.com/marcaPERU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/@marcaperu"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p class="footer-p">© 2024 Visit Peru All rights reserved.</p>

    </footer>
</body>

</html>