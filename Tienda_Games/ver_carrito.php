<?php
session_start(); // Iniciar la sesión para acceder al carrito
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Tu carrito de compras</h1>

    <section class="carrito">
        <?php
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            $total = 0;
            echo "<div class='productos-carrito'>";
            
            foreach ($_SESSION['carrito'] as $producto) {
                $nombre = htmlspecialchars($producto['nombre']);
                $imagen = htmlspecialchars($producto['imagen']);
                $descripcion = htmlspecialchars($producto['descripcion']);
                $precio = number_format($producto['precio'], 2);
                $cantidad = intval($producto['cantidad']);
                $subtotal = $producto['precio'] * $cantidad;
                $total += $subtotal;

                echo "
                <article class='producto-carrito'>
                    <h3>{$nombre}</h3>
                    <img src='{$imagen}' class='product-image' alt='{$nombre}'>
                    <p>{$descripcion}</p>
                    <p>Precio: €{$precio}</p>
                    <p>Cantidad: {$cantidad}</p>
                    <p>Subtotal: €" . number_format($subtotal, 2) . "</p>
                </article>
                ";
            }
            echo "</div>";
            echo "<h2>Total: €" . number_format($total, 2) . "</h2>";
        } else {
            echo "<p>Tu carrito está vacío.</p>";
        }
        ?>
    </section>

    <a href="products.php">Seguir comprando</a>
</body>
</html>
