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
<!--Verificar los datos de la bbdd en la página-->
<?php
echo "<pre>";
print_r($productos);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">

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

</head>

<body>
    <header>
        <header>
            <nav class="navbar grid cinco">
                <a class="logo" href="https://st4.depositphotos.com/1001439/22584/i/450/depositphotos_225842186-stock-photo-bakery-dessert-shop-bakehouse-logo.jpg"></a>
                <a href="./tartas.php">Inicio</a>
                <a href="./productos.php">Productos</a>
                <a href="./preguntas.php">Preguntas frecuentes</a>
                <a href="./contacto.php">Contacto</a>
            </nav>
        </header>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod perspiciatis laboriosam atque nobis, eaque provident minus at voluptates, molestias quia fugit beatae, velit quam excepturi ut vero deserunt aut corporis?</p>
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
                    <p>' . $alergenos .  '</p>
                    <a href="productos.php?id=' . $id . '"><button>Adquirir</button></a>
                </article>';
                    }
                }
                ?>
            </section>
        </main>
        <!--Archivos .js-->
        <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
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