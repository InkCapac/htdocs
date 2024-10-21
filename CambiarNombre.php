<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru</title>
    <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
    <!--Fonts para la página (Montserrat Alternates)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--Archivos CSS-->
    <link rel="stylesheet" href="./css_files/gallery.css">
    <link rel="stylesheet" href="./css_files/main.css">
    <link rel="stylesheet" href="./css_files/info_form.css">
    <link rel="stylesheet" href="./css_files/nav_bar.css">
    <!--Fuente de iconos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <!-- Cargador 
    <div id="loader"></div>
-->

    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                alt="Marca Perú" class="navbar-imagen"></a>
        <a href="#">Visit Peru</a>
        <a href="./destinos.php">Destinos</a>
        <a href="./gastronomia.php">Gastronomía</a>
        <a href="./festivales.php">Festivales</a>
    </div>

    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="https://wallpapers.com/images/hd/lima-peru-shoreline-night-view-9mqbb0myqcqg0w16.jpg" data-index="1">
            <img class="gallery-item" src="https://www.comeseeperutours.com/wp-content/uploads/2024/09/Cebiche-Peru-1.jpg" data-index="2">
            <img class="gallery-item" src="https://www.perutravels.net/wp-content/uploads/2022/05/Corpus-Christi-festivales-en-peru.jpeg" data-index="3">
        </div>
    </div>

    <!-- Botones de navegación -->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Siguiente</button>
    </div>

    <!-- Foto de postal -->
    <div>
        <img src="https://ih1.redbubble.net/image.4847536312.1207/flat,750x,075,f-pad,750x1000,f8f8f8.jpg" alt="Peruvian Postal">
        <p>Lorem ipsum dolor sit amet...</p>
    </div>
    <!--Postal antigua-->
    <div>
        <img src="https://storage.googleapis.com/hippostcard/p/b6eca78a36ceccbe01fbb7e69106155b-800.jpg" alt="Vintage Peru">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, fugiat ea nesciunt magnam voluptas aliquid neque ab blanditiis, consectetur tenetur explicabo qui, commodi exercitationem. Expedita dignissimos voluptate praesentium mayores ipsum!</p>
    </div>
    <!-- Sección de contenido -->
    <div class="content">
        <div class="grid">
            <div class="image-container">
                <img class="image-section" src="./content_images/macchu_picchu.jpg" alt="Machu Picchu">
                <p>Lorem ipsum dolor sit amet...</p>
            </div>
            <!-- ... más contenedores de imágenes ... -->
        </div>
    </div>
    <!-- Capa -->
    <div id="capa" class="capa" style="display:none;"></div>

    <!-- Botón Embajadores -->
    <button style="font-family: Montserrat Alternates; font-size:x-large" class="contact">CONTÁCTANOS</button>

    <!-- Caja de formulario -->
    <div class="form-box">
        <h2>Miembros de PromPeru</h2>

        <!-- Navegación para Login y Registro -->
        <div class="form-toggle">
            <button id="login-toggle" class="active">Login</button> |
            <button id="register-toggle">Registrarse</button>
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

            <p class="forgot-password"><a href="#">Olvidaste tu contraseña?</a></p>

            <button type="submit">INGRESAR</button>
        </form>

        <!-- Formulario de registro (Inicialmente oculto) -->
        <form id="register-form" class="grid inputs" style="display:none;">
            <p>Hazte miembro de PromPERÚ</p>

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

            <button type="submit">Enviar datos</button>
        </form>
    </div>


    <!-- Archivos JS -->
    <script src="./js_linkedPages/general_navbar.js"></script>
    <script src="./js_files/gallery.js"></script>
    <script src="./js_files/info_form.js"></script>
    <script src="./js_files/main.js"></script>
    <script src="./js_linkedPages/general_loadingPage.js"></script>

    <!-- Pie de página -->
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/marcaPERU.lat"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/peru/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://x.com/marcaPERU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/@marcaperu"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© 2024 Visit Peru Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>