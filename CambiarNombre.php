<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru</title>
    <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
    <!--CSS Files-->
    <link rel="stylesheet" href="./css_files/gallery.css">
    <link rel="stylesheet" href="./css_files/main.css">
    <link rel="stylesheet" href="./css_files/info_form.css">
    <link rel="stylesheet" href="./css_files/nav_bar.css">
    <!--Social media icons font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <!-- Loader -->
    <div id="loader"></div>

    <!-- Navbar -->
    <div class="navbar">
        <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                alt="Marca Perú" class="navbar-imagen"></a>
        <a href="#">Visit Peru</a>
        <a href="./destinos.php">Destinos</a>
        <a href="./gastronomia.php">Gastronomía</a>
        <a href="./festivales.php">Festivales</a>
    </div>

    <!-- Image Gallery -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="./gallery_images/montana_7colores.jpg" data-index="1">
            <img class="gallery-item" src="./gallery_images/peru_lake.jpg" data-index="2">
            <img class="gallery-item" src="./gallery_images/peruvian_food.jpg" data-index="3">
        </div>
    </div>

    <!-- Navigation buttons -->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Siguiente</button>
    </div>

    <!-- Persuasive Text -->
    <div>
        <p>Lorem ipsum dolor sit amet...</p>
    </div>

    <!-- Content Section -->
    <div class="content">
        <div class="grid">
            <div class="image-container">
                <img class="image-section" src="./content_images/macchu_picchu.jpg" alt="Machu Picchu">
                <p>Lorem ipsum dolor sit amet...</p>
            </div>
            <!-- ... more image containers ... -->
        </div>
    </div>
    <!-- Capa -->
<div id="capa" class="capa" style="display:none;"></div>

<!-- Embajadores Button -->
<button class="contact">Embajadores</button>

<!-- Form Box -->
<div class="form-box">
    <h2>Miembro de PromPeru</h2>

    <!-- Navigation for Login and Register -->
    <div class="form-toggle">
        <button id="login-toggle" class="active">Login</button> |
        <button id="register-toggle">Registrarse</button>
    </div>

    <!-- Login Form -->
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

    <!-- Register Form (Initially hidden) -->
    <form id="register-form" class="grid inputs" style="display:none;">
        <p>Forma parte de PromPERÚ...</p>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Confirmar contraseña</label>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <p>Información adicional</p>
        <textarea id="additional-info" name="additional_info" cols="30" rows="5"></textarea>

        <div class="grid checkbox-message">
            <input type="checkbox" id="consent" name="consent" required>
            <label for="consent">Aceptar términos...</label>
        </div>

        <button type="submit">Enviar datos</button>
    </form>
</div>


    <!-- JS Files -->
    <script src="./js_files/gallery.js"></script>
    <script src="./js_files/info_form.js"></script>
    <script src="./js_files/main.js"></script>
    <script src="./js_linkedPages/general_loadingPage.js"></script>

    <!-- Footer -->
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <!-- ... more icons ... -->
            </div>
            <p>© 2024 Visit Peru All rights reserved.</p>
        </div>
    </footer>
</body>

</html>