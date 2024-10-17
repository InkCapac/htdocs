<?php
session_start();
include_once("./conectar.php");
include_once("./carrito_funciones.php");

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "tienda";

$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
$carrito = new Carrito($conexion->get_connection());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito</title>
    <style>
        .cart-item {
            margin: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            transition: box-shadow 0.3s;
        }
        .cart-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        button {
            background-color: var(--color5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #ff5555; /* A slightly lighter shade for hover effect */
        }
    </style>
</head>
<body>

<h1>Tu Carrito</h1>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <?php foreach ($_SESSION['cart'] as $product_id => $details): ?>
        <?php
        // Fetch product details from the database using prepared statements
        $stmt = $conexion->get_connection()->prepare("SELECT * FROM tartas WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($producto = $result->fetch_assoc()): ?>
            <div class="cart-item">
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                <p>Cantidad: <?php echo $details['quantity']; ?></p>
                <form method="POST" action="carrito_remover.php">
                    <input type="hidden" name="product_id" value="<?php echo $producto['id']; ?>">
                    <button type="submit">Eliminar del Carrito</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tu carrito está vacío.</p>
<?php endif; ?>

<a href="productos.php">Volver a Productos</a>

</body>
</html>
