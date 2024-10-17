<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Contacto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Archivos de .css -->
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_contacto.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">
</head>

<body>
    <header>
        <nav class="navbar grid cinco">
            <a href="./tartas.php">Inicio</a>
            <a href="./productos.php">Productos</a>
            <a class="logo-nav" href="#">
                <img src="./tienda_tartas_images/zarifKamiso.png" alt="Logo">
            </a>
            <a href="./preguntas.php">Preguntas frecuentes</a>
            <a href="./contacto.php">Contacto</a>
        </nav>
    </header>

    <main>
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
                    <label for="consent">Por favor, haz clic en este botón para asegurarnos de que estás de acuerdo con
                        nuestras condiciones de servicio.</label>
                </div>
                <button type="submit">Enviar datos</button>
            </form>
        </div>
    </main>

    <!-- Archivos .js -->
    <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
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