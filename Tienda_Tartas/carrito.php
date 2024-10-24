<?php
session_start();
include_once("./conectar.php");

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "tienda";

class Carrito {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizar_item($product_id, $quantity) {
        $query = "UPDATE carrito SET cantidad = ? WHERE id_producto = ?";
        $this->conexion->hacer_consulta($query, 'ii', [$quantity, $product_id]);
    }

    public function agregar_item($product_id, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
        $this->conexion->hacer_consulta($query, 'isid', [$product_id, $nombre, $cantidad, $precio]);
    }

    public function obtener_producto($id) {
        $query = "SELECT * FROM tartas WHERE id = ? LIMIT 1";
        return $this->conexion->recibir_datos($query, 'i', [$id]);
    }

    public function obtener_items_carrito() {
        $query = "SELECT * FROM carrito";
        return $this->conexion->recibir_datos($query);
    }
}

$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$carrito = new Carrito($conexion);

$id = $_GET['id'] ?? null;
if ($id) {
    $productData = $carrito->obtener_producto($id);
    if (!empty($productData)) {
        $product = $productData[0];
        $quantity = 1;
        $carrito->agregar_item($product['id'], $product['nombre'], $quantity, $product['precio']);
        $_SESSION['message'] = 'Product added to cart successfully!';
        header('Location: tartas.php');
        exit;
    } else {
        $_SESSION['message'] = 'Product not found.';
        header('Location: tartas.php');
        exit;
    }
}

$items_carrito = $carrito->obtener_items_carrito();
