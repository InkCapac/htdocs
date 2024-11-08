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
$productos = $conexion->recibir_datos("SELECT * FROM catalogo LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konami Code</title>
    <link rel="shortcut icon" href="https://www.shareicon.net/download/2015/08/20/87888_dragon-ball.ico" type="image/x-icon">
    <!--Font del texto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Archivos css -->
    <link rel="stylesheet" href="./css_store/index_store.css">
    <link rel="stylesheet" href="./css_store/catalogue_store.css">
    <link rel="stylesheet" href="./css_store/gallery_store.css">
    <link rel="stylesheet" href="./css_store/index_store.css">
    <link rel="stylesheet" href="./css_store/navbar_store.css">
    <link rel="stylesheet" href="./css_store/carrito_store.css">
    <!-- Archivo css del chat-->
    <link rel="stylesheet" href="./css_store/chat_style.css">
</head>

<body>
    <!-- Barra de navegación de la página web-->
    <div class="navbar">
        <a href="./index.php">RedRibbon</a>
        <a href="#inicio-products">Productos</a>
        <a href="#" class="logo-nav"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Red_Ribbon_Army_Logo.png"
                alt="RedRoom" class="navbar-imagen"></a>
        <a href="">Partners</a>
        <a href="">Events</a>
    </div>

    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="https://easycdn.es/1/imagenes/articulos_337745.png" data-index="1">
            <img class="gallery-item" src="https://blog.es.playstation.com/tachyon/sites/14/2023/09/6087d4b0644c916a7562b5c35569d8a70d3ca330.jpg" data-index="2">
            <img class="gallery-item" src="https://i.ytimg.com/vi/p6-MsytRGTE/maxresdefault.jpg" data-index="3">
            <img class="gallery-item" src="https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/11/playstation-studios-fan-requested-remake.jpg" data-index="4">
            <img class="gallery-item" src="https://i.rtings.com/assets/pages/EEgK6vzi/best-ps5-monitors-20230824-medium.jpg?format=auto" data-index="5">
        </div>
    </div>
    <!-- Botones de la galería de imágenes -->
    <div class="nav-buttons">
        <button style="font-family: arcade;" class="nav-button" id="prevButton">Anterior</button>
        <button style="font-family: arcade" class="nav-button" id="nextButton">Adelante</button>
    </div>
    <h1 id="inicio-products" class="parrafo-1">
        <p>Pick up the videogame you most like!</p>
    </h1>

    <!-- Catálogo productos -->
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $producto_id = $productos[$i]["id"]; // Obtén el id del producto desde la base de datos
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    echo '
        <article id="producto' . $producto_id . '"> <!-- Usa el id del producto en el id del article -->
            <h3>' . $nombre . '</h3>
            <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
            <p class="description-style">' . $descripcion . '</p>
            <p>' . $precio . '</p>
            <button class="adquirir-btn" data-id="' . $producto_id . '">Adquirir</button>
        </article>';
                }
            }
            ?>

        </section>
    </main>
<!--Sección del formulario-->
                <!-- Capa -->
                <div id="capa" class="capa" style="display:none;"></div>

<!-- Botón de contacto -->
<button style="font-family: Montserrat Alternates; font-size:x-large" class="contact">CARRITO</button>

<!-- Caja de formulario -->
<div class="form-box">
    <h2>Thanks for buying in our store</h2>

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

        <p class="forgot-password"><a href="#">Olvidaste tu contraseña?</a></p>

        <button style="font-family: Montserrat Alternates;" type="submit">INGRESAR</button>
    </form>

    <!-- Formulario de registro (Inicialmente oculto) -->
    <form id="register-form" class="grid inputs" style="display:none;">
        <p style="font-size:large; font-weight:bold">Hazte miembro de <a href="https://www.gob.pe/promperu">PROMPERÚ</a></p>

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
        <button style="font-family: Montserrat Alternates" type="submit">REGISTRARME</button>
    </form>
</div>

    <!--Contennido del chat-->
    <div class="chat">
        <div>
            <div class="conversacion">
        <p>¿Hola, qué quieres preguntarme?</p>
    </div>
        <input placeholder="Escribe tu mensaje">
        <button id="enviar" class="enviar-btton">Enviar</button>
    </div>
        <div class="derecha">
            <button class="abrir-chat">Abrir chat</button>
        </div>
    </div>

    <button id="vaciarCarrito" class="vaciar-button">Vaciar Carrito</button>

    <!-- Archivos JavaScript -->
    <script src="./js_store/gallery_store.js"></script>
    <script src="./js_store/navbar_store.js"></script>
    <script src="./js_store/carrito_store.js"></script>
    <script src="./js_store/carritoStyle_store.js"></script>
    <!-- Archivo js chat-->
    <script src="./js_store/chat.js"></script>
    <footer></footer>
    <div class="hamburguesa">
        -<br>-<br>-
    </div>
</body>

</html>