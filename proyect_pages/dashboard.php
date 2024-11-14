<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $user_id; ?>!</h1>
    <p>Este es tu panel de usuario.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
