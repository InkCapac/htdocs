<?php
session_start();

// Incluir archivo de conexión
require 'conectar.php';

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "proyect";

$conn = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$error_message = ''; 

// Verificar si la sesión ya está iniciada y que no estamos en la página de la galería
if (isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) !== 'galeria.php') {
    // Si el usuario ya está logueado, redirigirlo al portfolio
    $user_id = $_SESSION['user_id'];
    $consulta = "SELECT * FROM usuarios WHERE id = ?";
    $usuarios = $conn->recibir_datos($consulta, 'i', [$user_id]);

    if ($usuarios && !empty($usuarios)) {
        // Redirigir a portfolioContent.php si el usuario existe
        header("Location: portfolioContent.php?id=$user_id");
        exit();
    } else {
        // Si el usuario no existe o la sesión ha caducado, cerrar sesión
        session_unset();
        session_destroy();
        $error_message = "Tu sesión ha caducado o el usuario no existe.";
    }
}

// Procesar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE email = ?";
    $usuarios = $conn->recibir_datos($consulta, 's', [$email]);

    if ($usuarios) {
        $user = $usuarios[0];
        if (password_verify($password, $user['password'])) {
            // Guardar datos de usuario en sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            // Redirigir al portfolio del usuario
            header("Location: portfolioContent.php?id=" . $user['id']);
            exit();
        } else {
            // Si la contraseña es incorrecta
            $error_message = "Contraseña incorrecta.";
        }
    } else {
        // Si el usuario no existe
        $error_message = "Usuario no encontrado.";
    }
}

// Mostrar mensajes de error
if (!empty($error_message)) {
    echo $error_message;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Portfolio</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/6020N5e12escaooFy55JlqTYGp43y_0G1c9nfVkfPVjr9-W9iIqgm4L6TKOzDl1bhtF6WH1J=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_indexPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
    <link rel="stylesheet" href="./css_linkedPages/css_chatGeneral.css">
    <link rel="stylesheet" href="./css_linkedPages/css_galleryGeneral.css">
</head>
<body>
    <!--Barra de navegación-->
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="./registro.php">Registrarse</a>
        <a href=""></a>
        <a href="./galeria.php">Galería</a>
        <a href="">Favoritos</a>
    </nav>
    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="https://instronic.com/wp-content/uploads/PORTADA-FULL-SIZE-1-scaled.jpg" data-index="1">
            <img class="gallery-item" src="https://fotografias.larazon.es/clipping/cmsimages01/2023/08/03/B3F57F5E-B3A6-441B-8FAA-152CAA6441BF/formacion-pelicula-sector-expansion-asi-son-grados-the-core_98.jpg?crop=1116,628,x43,y0&width=1900&height=1069&optimize=low&format=webply" data-index="2">
            <img class="gallery-item" src="https://www.thecoreschool.com/wp-content/uploads/2023/11/FP_innovacion.jpg" data-index="3">
            <img class="gallery-item" src="https://www.periodicopublicidad.com/media/lapublicidad/images/2022/03/23/20220323091553116676.jpg" data-index="4">
            <img class="gallery-item" src="https://www.morillas.com/assets/themes/www.morillas.com/img/gallery/galeria_thecore_2/es/thecore6a_min.jpg" data-index="5">
        </div>
    </div>
    <!-- Botones de la galería de imágenes -->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Anterior</button>
        <button class="nav-button" id="nextButton">Adelante</button>
    </div>
    <h1>Iniciar sesión</h1>
    <!-- Mostrar el mensaje de error si existe ----->
    <?php if (!empty($error_message)): ?>
        <div style="color: red;"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>
    <div class="login-form-box">
    <!--LUGAR A DONDE SE ENVIA LOS DATOS-->
    <!--<form class="form-login" action="login.php" method="POST">-->
    <form class="form-login" action="index.php" method="POST">
        <label class="mail-style" for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button class="login-button" type="submit">Iniciar sesión</button>
    </form>
    <p class="login-p">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>
    <!--Caja de chat-->
    <div class="chat">
        <div>
            <div class="conversacion">
                <p>¿Hola, qué quieres preguntarme?</p>
    </div>
        <input style="font-family: Source Code Pro;" placeholder="Escribe tu mensaje">
        <button id="enviar" class="enviar-btton">Enviar</button>
    </div>
        <div class="derecha">
            <button class="abrir-chat">Abrir chat</button>
        </div>
    </div>
    <!--Archivos js-->
    <script src="./js_linkedPages/js_chatGeneral.js"></script>
    <script src="./js_linkedPages/js_galleryGeneral.js"></script>
</body>
</html>
