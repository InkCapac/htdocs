<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru - Gastronomía</title>
    <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
    <!--Fonts para la página (Montserrat Alternates) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--Archivos .css -->
    <link rel="stylesheet" href="./css_linkedPages/destinos.css">
    <link rel="stylesheet" href="./css_linkedPages/general_navbar.css">
    <link rel="stylesheet" href="./css_linkedPages/general_gallery.css">
    <link rel="stylesheet" href="./css_linkedPages/general_infoForm.css">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Página de carga -->
    <div id="loader"></div>
    <!--Barra de navegación de la página web-->
    <script src="./js_files/nav_bar.js"></script>
    <div class="navbar">
        <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                alt="Marca Perú" class="navbar-imagen"></a>
        <a href="Main page">Visit Peru </a>
        <a href="./destinos.php">Destinos</a>
        <a href="#inicio-gastronomia">Gastronomía</a>
        <a href="./festivales.php">Festivales</a>
    </div>

    <!--Galería de imágenes-->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active"
                src="https://www.eliteplusmagazine.com/assets/ckeditor_fileupload/uploads/Photo4%20-Ceviche2_1167407481.jpg"
                data-index="1">
            <img class="gallery-item"
                src="https://preview.redd.it/i6elkf8ugtba1.jpg?auto=webp&s=46b7f0e535e780c00b4dded90f0913316d80b24d"
                data-index="2">
            <img class="gallery-item"
                src="https://media.cntraveler.com/photos/6374fcbd516f47c031cea868/16:9/w_2560%2Cc_limit/Mundo%2520Mater%2520.jpg"
                data-index="3">
            <img class="gallery-item"
                src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/ab/cf/63/la-rosa-nautica-esta.jpg?w=1200&h=-1&s=1"
                data-index="4">
        </div>
    </div>

    <!--Botones de navegación debajo de la galería-->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Siguiente</button>
    </div>

    <p id="inicio-gastronomia">La cocina peruana es una vibrante fusión de ingredientes autóctonos y diversas
        influencias culturales, lo que la
        convierte en una de las tradiciones culinarias más apasionantes del mundo. Platos como el **ceviche**, el **lomo
        saltado** y el **ají de gallina** muestran la riqueza de los sabores locales, mezclando marisco fresco,
        alimentos andinos básicos y atrevidas especias. Influenciada por tradiciones culinarias indígenas, españolas,
        africanas y asiáticas, la comida peruana es famosa por su creatividad, variedad y profundidad de sabor. Desde la
        costa hasta la sierra, la cocina peruana refleja el rico patrimonio cultural del país y su singular diversidad
        geográfica.</p>

    <!--Contenido del formulario en la esquina-->
    <!-- Capa que cubre el contenido principal cuando se activa el formulario -->
    <!-- Capa -->
    <div id="capa" class="capa" style="display:none;"></div>

    <!-- Botón de contacto -->
    <button style="font-family: Montserrat Alternates; font-size:x-large" class="contact">CONTÁCTANOS</button>

    <!-- Caja de formulario -->
    <div class="form-box">
        <h2>Socios de
            PROMPERÚ</h2>

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

            <div class="grid checkbox-message">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Recordar contraseña</label>
            </div>

            <p style="text-align: left; font-size:medium" class="forgot-password"><a href="#">Olvidaste tu
                    contraseña?</a></p>

            <button style="font-family: Montserrat Alternates;" type="submit">INGRESAR</button>
        </form>

        <!-- Formulario de registro (Inicialmente oculto) -->
        <form id="register-form" class="grid inputs" style="display:none;">
            <p style="text-align:left; font-size:large; font-weight:bold">Hazte miembro de <a
                    href="https://www.gob.pe/promperu">PROMPERÚ</a></p>

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
                <label for="consent"><a href="#"> Aceptar términos y condiciones.</a></label>
            </div>
            <br>
            <button style="font-family: Montserrat Alternates;" type="submit">REGISTRARME</button>
        </form>
    </div>


    <!--Archivos JavaScript de la página-->
    <script src="./js_linkedPages/general_navbar.js"></script>
    <script src="./js_linkedPages/general_gallery.js"></script>
    <script src="./js_linkedPages/general_loadingPage.js"></script>
    <script src="./js_linkedPages/general_infoForm.js"></script>
    <footer>
        <!--Símbolos de redes sociales-->
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/marcaPERU.lat"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/peru/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://x.com/marcaPERU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i
                        class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/@marcaperu"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p class="footer-p">© 2024 Visit Peru All rights reserved.</p>

    </footer>
</body>

</html>