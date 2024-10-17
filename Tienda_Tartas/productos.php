<?php 
session_start(); // Inicia la sesión para acceder a las variables de sesión

// Incluye la clase de conexión a la base de datos
include_once("./conectar.php"); 

// Reemplaza esto con tus credenciales de base de datos reales
$servidor = "localhost"; // generalmente "localhost"
$usuario = "root"; // el nombre de usuario predeterminado para XAMPP es "root"
$contrasena = ""; // la contraseña predeterminada suele estar vacía para root en XAMPP
$bbdd = "tienda"; // el nombre de tu base de datos

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para agregar un artículo al carrito
    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
        $result = $this->conexion->hacer_consulta($query, 'isid', [$product_id, $nombre, $cantidad, $precio]);
        
        if (!$result) {
            // Registra o maneja el error según sea necesario
            $_SESSION['message'] = "Error al agregar el artículo al carrito.";
            header("Location: productos.php"); // Redirige de vuelta a productos.php
            exit();
        }
    }

    // Método para obtener un producto
    public function obtener_producto($id) {
        $query = "SELECT * FROM tartas WHERE id = ?"; // Suponiendo que los productos tienen ID únicos
        $result = $this->conexion->hacer_consulta($query, 'i', [$id]);
        
        if ($result) {
            return $result;
        } else {
            return []; // Devuelve un array vacío si la consulta falla
        }
    }
}

// Instancia la clase Conectar con los detalles de la base de datos
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$carrito = new Carrito($conexion);

// Verifica si se pasa un ID a través de GET
$id = $_GET['id'] ?? null;
if ($id) {
    // Recupera los detalles del producto
    $productData = $carrito->obtener_producto($id);
    if (!empty($productData)) {
        $product = $productData[0];
        $quantity = 1; // Establece la cantidad deseada
        // Agrega el producto al carrito
        $carrito->agregar_item($product['id'], $product['nombre'], $quantity, $product['precio']);
        
        // Establece un mensaje de sesión
        $_SESSION['message'] = "¡Producto agregado al carrito con éxito!";
        header("Location: productos.php"); // Redirige de vuelta a productos.php
        exit(); // Asegúrate de que no se ejecute más código
    } else {
        $_SESSION['message'] = "Producto no encontrado.";
        header("Location: productos.php"); 
        exit();
    }
}

// Recupera todos los productos de la base de datos
$query = "SELECT * FROM tartas"; // Actualiza esto a tu consulta SQL real
$productos = $conexion->hacer_consulta($query); // Debería devolver un array

// Asegúrate de que $productos sea un array
if (is_array($productos)) {
    $contar_articulos = count($productos); // Cuenta el número de productos
} else {
    $contar_articulos = 0; // Establece el conteo a 0 si $productos no es un array
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Productos</title>
    <link rel="shortcut icon"
        href="https://static.wixstatic.com/media/aac7c7_2d43f156b81a4898b84dd5794e9e3041~mv2.png/v1/fill/w_104,h_99,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/zk1.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_catalogo.css">
    <link rel="stylesheet" href="./tienda_tartas_css/carrito_tartas.css">
</head>

<body>
<?php
// Verifica si hay un mensaje y lo muestra si existe
if (isset($_SESSION['message'])) {
    echo '<div class="notification">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Borra el mensaje después de mostrarlo
}
?>
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
    <div class="begin-text">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis quaerat, similique eius enim maiores id
            veritatis qui sapiente earum autem, atque mollitia sint exercitationem veniam sit? Distinctio eum atque ad!
        </p>
    </div>

    <div class="image-placeholder productos-gif">
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
                foreach ($productos as $producto) {
                    $id = $producto["id"];
                    $nombre = $producto["nombre"];
                    $imagen = $producto["imagen"];
                    $descripcion = $producto["descripcion"];
                    $precio = number_format($producto["precio"], 2); // Formatea el precio
                    $alergenos = $producto["alergenos"];

                    echo "
        <article class='product-layout'>
            <h3>" . htmlspecialchars($nombre) . "</h3>
            <img src='" . htmlspecialchars($imagen) . "' class='product-image' alt='" . htmlspecialchars($nombre) . "'>
            <p>" . htmlspecialchars($descripcion) . "</p>
            <p>Precio: €" . $precio . "</p>
            <p>Alergenos: " . htmlspecialchars($alergenos) . "</p>
            <a href='productos.php?id=" . $id . "' class='adquirir-button'>ADQUIRIR</a>
        </article>
        ";
                }
            }
            ?>
        </section>
    </main>
    <script src="./js_tienda_tartas/navbar_general_tartas.js"></script>
    <script src="./js_tienda_tartas/carrito_tartas.js"></script>
    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/zarifkamiso/?hl=es"><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© Zarif Kamiso 2024 Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>
