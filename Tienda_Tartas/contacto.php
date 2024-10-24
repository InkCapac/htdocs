<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Contacto</title>
    <link rel="shortcut icon"
        href="https://static.wixstatic.com/media/aac7c7_2d43f156b81a4898b84dd5794e9e3041~mv2.png/v1/fill/w_104,h_99,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/zk1.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_contacto.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">
</head>

<body>
    <header>
        <nav class="navbar-contacto grid cinco">
            <a href="./tartas.php">Inicio</a>
            <a href="./productos.php">Productos</a>
            <a class="logo-nav" href="#">
                <img src="./tienda_tartas_images/zarifKamiso.png" alt="Logo">
            </a>
            <a href="./preguntas.php">Preguntas frecuentes</a>
            <a href="./contacto.php">Contacto</a>
        </nav>
    </header>
    <p class="image-placeholder contacto"></p>
    <section>
        <div class="form-container">
            <img src="https://cdn.app-sorteos.workers.dev/https://instagram.fmad21-1.fna.fbcdn.net/v/t51.2885-15/381200716_6993046934080044_4893452851714131117_n.jpg?stp=dst-jpg_e15&efg=eyJ2ZW5jb2RlX3RhZyI6ImltYWdlX3VybGdlbi43MjB4MTI4MC5zZHIuZjM2MzI5LmRlZmF1bHRfY292ZXJfZnJhbWUifQ&_nc_ht=instagram.fmad21-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=31hp1vCvmn8Q7kNvgG3M90U&_nc_gid=cc6ef4de5dc84fa9b6aaba1b48164a99&edm=ALQROFkBAAAA&ccb=7-5&ig_cache_key=MzE5OTU5NTc0MTEwOTgxMDE3NDI5ODgwNTM0OTQzNzE2MQ%3D%3D.3-ccb7-5&oh=00_AYBixipTYdB2gtlg5qESP9pgaE-xfesjOZdW_eVG_mGIPw&oe=671726B9&_nc_sid=fc8dfb"
                alt="Tarta" class="form-image">
            <div class="form-box">
                <form>
                    <p>Ordena tu tarta</p>
                    <div class="grid inputs">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                        <label for="phone">Teléfono</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <p>Información adicional</p>
                    <textarea id="additional-info" name="additional_info" cols="30" rows="10" required></textarea>
                    <div class="grid checkbox-message">
                        <input type="checkbox" id="consent" name="consent" class="arriba" required>
                        <label for="consent">Por favor, haz clic en este botón para asegurarnos de que estás de acuerdo con nuestras condiciones de servicio.</label>
                    </div>
                    <button type="submit">Enviar datos</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/zarifkamiso/?hl=es"><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© Zarif Kamiso 2024. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Archivos .js -->
    <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
</body>

</html>
