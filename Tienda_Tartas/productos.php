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
$productos = $conexion->recibir_datos("SELECT * FROM tartas LIMIT 12 OFFSET $pagina");
$contar_articulos = count($productos);
$paginas = ($contar_articulos / 12) + 1;
?>
<!--Verificar los datos de la bbdd en la página
echo "<pre>";
print_r($productos);
echo "</pre>";
<!DOCTYPE html>
<html lang="es">
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Productos</title>
    <!--Fuentes-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Archivos .css-->
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_catalogo.css">
    <link rel="stylesheet" href="./tienda_tartas_css/carrito_tartas.css">

</head>

<body>
    <!--Sección de la barra navegadora-->
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

<!-- Placeholder for the image -->
<div class="imagen-central">
    <img src="./tienda_tartas_images/zarif_kamiso.jpg" alt="">
</div>
<div class="image-placeholder">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis quaerat, similique eius enim maiores id veritatis qui sapiente earum autem, atque mollitia sint exercitationem veniam sit? Distinctio eum atque ad!</p>
</div>

    <!--Sección del formulario de la esquina-->
    <!--Formulario-->
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
                <label for="consent">Por favor, haz click en este botón para asegurarnos que estás de acuerdo con
                    nuestras condiciones de servicio.</label>
            </div>
            <button type="submit">Enviar datos</button>
        </form>
        <button class="contact">Embajadores</button>
    </div>
    <!--Sección del primer contenido-->
    <div class="productos-gif">
        <img src="https://i.pinimg.com/originals/6f/a8/c4/6fa8c4e0bf5650788ce46c97c13566ab.gif" />
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod perspiciatis laboriosam atque nobis, eaque
            provident minus at voluptates, molestias quia fugit beatae, velit quam excepturi ut vero deserunt aut
            corporis?</p>
    </div>
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $id = $productos[$i]["id"];
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    $alergenos = $productos[$i]["alergenos"];
                    echo '
                <article class="product-layout">
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                    <p>' . $alergenos . '</p>
                    <a href="productos.php?id=' . $id . '"><button>Adquirir</button></a>
                </article>';
                }
            }
            ?>
        </section>
    </main>
    <!--Archivos .js-->
    <!-- .js de la barra navegadora-->
    <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
    <!-- .js del carrito de compra-->
    <script src="./js_tienda_tartas/carrito_tartas.js"></script>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© Zarif Kamiso 2024 All rights reserved</p>
    </footer>
</body>

</html>