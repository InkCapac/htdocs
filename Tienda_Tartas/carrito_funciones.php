<?php
include_once("./conectar.php");

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para actualizar el artículo en el carrito
    public function actualizar_item($product_id, $quantity) {
        $query = "UPDATE carrito SET cantidad = ? WHERE id_producto = ?";
        $this->conexion->hacer_consulta($query, 'ii', [$quantity, $product_id]);
    }

    // Método para agregar un artículo al carrito
    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
        $this->conexion->hacer_consulta($query, 'isid', [$product_id, $nombre, $cantidad, $precio]);
    }
}
