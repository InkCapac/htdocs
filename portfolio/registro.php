<?php
// Iniciar sesión si es necesario
session_start();

// Conectar con la base de datos
require './conectar.php';
$conexion = new Conectar('localhost', 'root', '', 'proyect');

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generar el hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Obtener la conexión con la base de datos
    $conn = $conexion->obtener_conexion();

    // Verificar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el correo ya está registrado, mostrar un mensaje de error
    if ($result->num_rows > 0) {
        $error_message = "El correo ya está registrado.";
    } else {
        // Si no existe, insertar el nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password);
        if ($stmt->execute()) {
            // Redirigir al usuario al login si el registro es exitoso
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error al registrar el usuario. Intente nuevamente.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/6020N5e12escaooFy55JlqTYGp43y_0G1c9nfVkfPVjr9-W9iIqgm4L6TKOzDl1bhtF6WH1J=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_registerPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <nav class="grid navbar">
        <a href="./index.php">Inicio</a>
        <a href="./registro.php">Registrarse</a>
        <a href=""></a>
        <a href="galeria.php">Galería</a>
        <a href="">Favoritos</a>
    </nav>
    <div class="form-container">
        <h1>Registro de Usuario</h1>

        <!-- Mostrar error si hay alguno -->
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <form action="registro.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Registrar</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a></p>
    </div>
    <script src="./js_linkedPages/js_navbarGeneral.js"></script>
</body>

</html>