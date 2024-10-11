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
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Tienda de tartas artesanales</title>
    <!--La siguiente línea de código será para identificar más rápido las web-->
    <meta name="keywords" content="Tartas de queso, tartas, tartas artesanales, tartaletas, queso con lotus, tarta de maracuya, tarta de pistacho, cheesecake madrid, tartas madrid, cumpleaños, celebraciones">
    <meta name="description" content="Las mejores tartas artesanales de queso de Madrid. Pistacho, maracuya o Lotus. Para cumpleaños, celebraciones...">
    <!-- Fonts (fuentes) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="./tienda_tartas_images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="48x48" href="./tienda_tartas_images/favicon-48x48.png">
    <link rel="apple-touch-icon" sizes="192x192" href="./tienda_tartas_images/web-app-manifest-192x192.png">
    <link rel="apple-touch-icon" sizes="512x512" href="./tienda_tartas_images/web-app-manifest-512x512.png">
    <link rel="icon" type="image/png" sizes="114x114" href="./tienda_tartas_images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="120x120" href="./tienda_tartas_images/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="144x144" href="./tienda_tartas_images/web-app-manifest-192x192.png">
    <link rel="icon" type="image/png" sizes="152x152" href="./tienda_tartas_images/web-app-manifest-512x512.png">
    <link rel="manifest" href="./tienda_tartas_images/site.webmanifest">
    <meta name="msapplication-Tilecolor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./tienda_tartas_images/favicon-48x48.png">
    <meta name="theme-color" content="#ffffff">

    <!--Líneas de código para promocionar tu página web
    |
    |
    V
    -->
    <!-- Meta: Facenook, Instagram y Whatsapp -->
    <meta property="og:title" content="Zarif Kamiso | Tartas artesanales" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.zk.com" />
    <meta property="og:image" content="https://www.zk.com/logo.jpg" />
    <meta property="og:description" content="" />
    <meta property="og:width" content="400" />
    <meta property="og:heigth" content="300" />
    <!-- Twitter -> X -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:size" content="@zk">
    <meta name="twitter:title" content="Zarif Kamiso - Tartas Artesanales">
    <meta name="twitter:description" content="Las mejores tartas artesanales de queso de Madrid.">
    <meta name="twitter:image:src" content="https://www.zk.com/logo.jpg">
    <meta name="twitter:domain" content="https://www.zk.com">
    
    <!-- Archivos css del proyecto -->
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_main.css">
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_catalogo.css">
</head>

<body>
    <header>
        <div class="grid logo">
            <img src="./tienda_tartas_images/cake_average.png" alt="This is L4M3">
        </div>
        <nav class="grid cinco">
            <a href="">Inicio</a>
            <a href="">Ofertas</a>
            <a href="">Tartas</a>
            <a href="">Nosotros</a>
        </nav>
    </header>
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
                    echo '
                <article class="product-layout">
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                    <a href= "productos.php?id='.$id.'"><button>Adquirir</button><a>
                </article>';
                }
            }
            ?>
            <!-- Páginas individuales de cada producto -->
            <?php
            for ($i = 1; $i <= $paginas; $i++) {
                echo '<a href="tartas.php?pagina=' . $i . '">' . $i . '</a>';
            }
            for ($i = 1; $i <= $paginas; $i++) {
                echo '<a href="tartas.php?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a>';
            }
            ?>
        </section>
    </main>
</body>

</html>