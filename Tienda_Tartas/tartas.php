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
    <meta name="keywords" content="Tartas de queso, tartas, tartaletas, queso con lotus, tarta de maracuya, tarta de pistacho, cheesecake madrid, tartas madrid, cumpleaños, celebraciones">
    <meta name="description" content="">
    <link rel="stylesheet" href="./tienda_tartas.css/tienda_catalogo.css">
</head>

<body>
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <?php
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                for ($i = 0; $i < count($productos); $i++) {
                    $nombre = $productos[$i]["nombre"];
                    $imagen = $productos[$i]["imagen"];
                    $descripcion = $productos[$i]["descripcion"];
                    $precio = $productos[$i]["precio"];
                    echo '
                <article>
                    <h3>' . $nombre . '</h3>
                    <img src="' . $imagen . '" class="product-image" alt="' . $nombre . '">
                    <p>' . $descripcion . '</p>
                    <p>' . $precio . '</p>
                </article>';
                }
            }
            ?>
        </section>
    </main>
</body>

</html>