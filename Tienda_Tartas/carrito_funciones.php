<?php
include_once("./conectar.php"); // Include the database connection class

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion; // Store the mysqli connection
    }

    // Method to update item in the cart
    public function actualizar_item($product_id, $quantity) {
        // Update the item in the carrito table
        $query = "UPDATE carrito SET cantidad = $quantity WHERE id_producto = $product_id"; // Use correct column name
        return $this->conexion->query($query); // Return query result
    }

    // Method to add item to the cart
    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        // Insert the item into the carrito table
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES ($product_id, '$nombre', $cantidad, $precio)";
        return $this->conexion->query($query); // Return query result
    }
}
?>
