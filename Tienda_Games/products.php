<?php
session_start(); // Inicia la sesión para almacenar el carrito

// Incluye la clase de conexión a la base de datos
include_once("./conectar.php");

// Detalles de la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "tienda";

// Instancia de la clase Conectar
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);

// Verificar si se envió el ID del producto para agregar al carrito
if (isset($_GET['id'])) {
    $id_producto = intval($_GET['id']);

    // Consulta para obtener el producto seleccionado
    $query = "SELECT * FROM productos WHERE id = ?";
    $producto = $conexion->hacer_consulta($query, "i", [$id_producto]);

    if ($producto) {
        // Si no existe un carrito en la sesión, crearlo como un array
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Agregar el producto al carrito (usamos el ID del producto como clave)
        $item_carrito = [
            'id' => $producto[0]['id'],
            'nombre' => $producto[0]['nombre'],
            'imagen' => $producto[0]['imagen'],
            'descripcion' => $producto[0]['descripcion'],
            'precio' => $producto[0]['precio'],
            'cantidad' => 1 // Agregamos una cantidad inicial de 1
        ];

        // Verificar si el producto ya está en el carrito
        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $id_producto) {
                $item['cantidad']++; // Incrementar la cantidad si ya existe
                $encontrado = true;
                break;
            }
        }

        // Si el producto no está en el carrito, agregarlo
        if (!$encontrado) {
            $_SESSION['carrito'][] = $item_carrito;
        }
    }
}

// Obtener todos los productos
$query = "SELECT * FROM productos";
$productos = $conexion->hacer_consulta($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameRRoom | Productos</title>
    <script src="./js_tiendaGames/funciones.js"></script>
    <link rel="shortcut icon" href="https://www.shareicon.net/download/2015/08/20/87888_dragon-ball.ico" type="image/x-icon">
    <!-- Fuente de Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    <!--Archivos .css-->
    <link rel="stylesheet" href="./css_tiendaGames/products_tiendaGames.css">
    <link rel="stylesheet" href="./css_tiendaGames/general_navbar.css">
    <!--Link del 'font' que contiene los simbolos de redes sociales-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="navbar nav-font">
            <a href="#">Inicio</a>
            <a href="">Productos y accesorios</a>
            <a class="logo" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Red_Ribbon_Army_Logo.png" alt="Temporary logo" />
                <a>Socios</a>
                <a>Eventos</a>
                <a class="shop-cart" href="#"><img src="https://cdn-icons-png.flaticon.com/256/275/275790.png" /></a>
        </div>
    </header>
    <div>
        <p class="products-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt facere officia laboriosam a nostrum illum animi quaerat ratione nemo delectus necessitatibus iusto accusantium amet rem mollitia, aut officiis deleniti!</p>
        <p class="products-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt facere officia laboriosam a nostrum illum animi quaerat ratione nemo delectus necessitatibus iusto accusantium amet rem mollitia, aut officiis deleniti!</p>
        <p class="products-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt facere officia laboriosam a nostrum illum animi quaerat ratione nemo delectus necessitatibus iusto accusantium amet rem mollitia, aut officiis deleniti!</p>
    </div>
    <main>
        <div class="image-placeholder"></div>
        <section class="product-container grid una tablet-dos ordenador-tres">
            <?php
            $contar_articulos = count($productos);
            if ($contar_articulos < 1) {
                echo "<p>No se han encontrado artículos</p>";
            } else {
                echo "<div class='grid'>";
                foreach ($productos as $producto) {
                    $id = $producto["id"];
                    $nombre = $producto["nombre"];
                    $imagen = $producto["imagen"];
                    $descripcion = $producto["descripcion"];
                    $precio = number_format($producto["precio"], 2); // Formatea el precio

                    echo "
        <article class='grid product-layout'>
            <h3>" . htmlspecialchars($nombre) . "</h3>
            <img src='" . htmlspecialchars($imagen) . "' class='product-image' alt='" . htmlspecialchars($nombre) . "'>
            <p>" . htmlspecialchars($descripcion) . "</p>
            <p>Precio: €" . $precio . "</p>
            <a href='ver_carrito.php?id=" . $id . "' class='adquirir-button'>ADQUIRIR</a>
        </article>
        ";
                }
                echo "</div>";
            }
            ?>
            <!--    
        <article>
                <h3>Grand Theft Auto V</h3>
                <img src="https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg" alt="Game 1" />
                <p>Compralo ya!</p>
            </article>
            <article>
                <h3>Dragon Ball Sparking Zero</h3>
                <img src="https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg" alt="Game 1" />
                <p>Compralo ya!</p>
            </article>
            <article>
                <h3>Dragon Ball Sparking Zero</h3>
                <img src="https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg" alt="Game 1" />
                <p>Compralo ya!</p>
            </article>
            <article>
                <h3>Dragon Ball Sparking Zero</h3>
                <img src="https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg" alt="Game 1" />
                <p>Compralo ya!</p>
            </article>
            -->
        </section>
        <a href="./ver_carrito.php">
    </main>
    <button id="producto1">Añadir al carrito</button>
    <button id="producto2">Añadir al carrito</button>
    <button id="producto3">Añadir al carrito</button>
    <!-- Archivos .js -->
    <script src="./js_tiendaGames/generalNavbar.js"></script>
    <script src="./js_tiendaGames/funciones.js"></script>
    <footer>
        <!--Símbolos de redes sociales-->
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© 2024 Visit Peru All rights reserved.</p>
    </footer>
</body>

</html>