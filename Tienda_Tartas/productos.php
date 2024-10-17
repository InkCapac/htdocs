<?php 
session_start(); // Start the session to access session variables

// Include the database connection class
include_once("./conectar.php"); 

// Replace these with your actual database credentials
$servidor = "localhost"; // usually "localhost"
$usuario = "root"; // default username for XAMPP is "root"
$contrasena = ""; // default password is usually empty for root on XAMPP
$bbdd = "tienda"; // your database name

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Method to add item to the cart
    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
        $result = $this->conexion->hacer_consulta($query, 'isid', [$product_id, $nombre, $cantidad, $precio]);
        
        if (!$result) {
            // Log or handle the error as needed
            $_SESSION['message'] = "Error adding item to cart.";
            header("Location: productos.php"); // Redirect back to productos.php
            exit();
        }
    }

    // Method to fetch a product
    public function obtener_producto($id) {
        $query = "SELECT * FROM tartas WHERE id = ?"; // Assuming products have unique IDs
        $result = $this->conexion->hacer_consulta($query, 'i', [$id]);
        
        if ($result) {
            return $result;
        } else {
            return []; // Return an empty array if the query fails
        }
    }
}

// Instantiate the Conectar class with the database details
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$carrito = new Carrito($conexion);

// Check if an ID is passed through GET
$id = $_GET['id'] ?? null;
if ($id) {
    // Retrieve product details
    $productData = $carrito->obtener_producto($id);
    if (!empty($productData)) {
        $product = $productData[0];
        $quantity = 1; // Set desired quantity
        // Add the product to the cart
        $carrito->agregar_item($product['id'], $product['nombre'], $quantity, $product['precio']);
        
        // Set a session message
        $_SESSION['message'] = "Product added to cart successfully!";
        header("Location: productos.php"); // Redirect back to productos.php
        exit(); // Ensure no further code is executed
    } else {
        $_SESSION['message'] = "Product not found.";
        header("Location: productos.php"); 
        exit();
    }
}

// Fetch all products from the database
$query = "SELECT * FROM tartas"; // Update this to your actual SQL query
$productos = $conexion->hacer_consulta($query); // Should return an array

// Ensure that $productos is an array
if (is_array($productos)) {
    $contar_articulos = count($productos); // Count the number of products
} else {
    $contar_articulos = 0; // Set count to 0 if $productos is not an array
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Productos</title>
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
// Check for message and display it if exists
if (isset($_SESSION['message'])) {
    echo '<div class="notification">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Clear the message after displaying
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

    <div class="imagen-central">
        <img src="./tienda_tartas_images/zarif_kamiso.jpg" alt="Imagen Central">
    </div>
    <div class="image-placeholder">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis quaerat, similique eius enim maiores id
            veritatis qui sapiente earum autem, atque mollitia sint exercitationem veniam sit? Distinctio eum atque ad!
        </p>
    </div>

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
                foreach ($productos as $producto) {
                    $id = $producto["id"];
                    $nombre = $producto["nombre"];
                    $imagen = $producto["imagen"];
                    $descripcion = $producto["descripcion"];
                    $precio = number_format($producto["precio"], 2); // Format the price
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
</body>
</html>
