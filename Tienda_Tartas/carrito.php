<?php
session_start(); // Start the session
include_once("./conectar.php"); // Include the database connection class

// Use your actual database credentials
$servidor = "localhost"; 
$usuario = "root"; 
$contrasena = ""; 
$bbdd = "tienda"; 

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion; // Store the mysqli connection
    }

    // Method to update item in the cart
    public function actualizar_item($product_id, $quantity) {
        $query = "UPDATE carrito SET cantidad = ? WHERE id_producto = ?"; // Use prepared statement
        $this->conexion->hacer_consulta($query, 'ii', [$quantity, $product_id]); // Bind parameters
    }

    // Method to add item to the cart
    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)"; // Use prepared statement
        $this->conexion->hacer_consulta($query, 'isid', [$product_id, $nombre, $cantidad, $precio]); // Bind parameters
    }

    // Method to retrieve product details from the database
    public function obtener_producto($id) {
        $query = "SELECT * FROM tartas WHERE id = ? LIMIT 1"; // Prepare the SQL query
        return $this->conexion->recibir_datos($query, 'i', [$id]); // Fetch product details
    }
}

// Example usage of the Carrito class
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd); // Create a new database connection with credentials
$carrito = new Carrito($conexion); // Create a new Carrito instance

// Check if an ID is passed through GET
$id = $_GET['id'] ?? null; // Get the ID from the URL
if ($id) {
    // Retrieve product details
    $productData = $carrito->obtener_producto($id);
    if (!empty($productData)) {
        $product = $productData[0]; // Get the first product
        
        // Set the quantity (you can modify this based on your requirement)
        $quantity = 1; // Set desired quantity
        // Add the product to the cart
        $carrito->agregar_item($product['id'], $product['nombre'], $quantity, $product['precio']);
        
        // Set a session variable for the message
        $_SESSION['message'] = 'Product added to cart successfully!';

        // Redirect back to the products page
        header('Location: tartas.php');
        exit; // Make sure to exit after header redirect
    } else {
        $_SESSION['message'] = 'Product not found.';
        header('Location: tartas.php');
        exit; // Redirect to products page
    }
} else {
    $_SESSION['message'] = 'No product ID specified.';
    header('Location: tartas.php');
    exit; // Redirect to products page
}
?>
