<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Remove the product from the cart
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

header("Location: carrito_compras.php"); // Redirect back to cart
exit();
?>
