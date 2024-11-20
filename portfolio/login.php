<?php
session_start(); // Inicia la sesión

// Verificar si la sesión ya está iniciada
if (isset($_SESSION['user_id'])) {
    header("Location: editar.php"); // Redirige al panel de edición (o donde desees)
    exit();
}

// Incluir archivo de conexión
require 'conectar.php'; // Asegúrate de que la conexión esté correctamente incluida

// Crear una instancia de la clase Conectar
$servidor = "localhost"; // El servidor de tu base de datos
$usuario = "root";       // El usuario de la base de datos
$contrasena = "";        // La contraseña (si la tienes configurada)
$bbdd = "proyect";     // El nombre de la base de datos

// Instanciar la conexión
$conn = new Conectar($servidor, $usuario, $contrasena, $bbdd);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario por el email (Usamos consultas preparadas)
    $consulta = "SELECT * FROM usuarios WHERE email = ?";
    $usuarios = $conn->recibir_datos($consulta, 's', [$email]); // Usar el método recibir_datos

    // Verifica si el usuario existe
    if ($usuarios) {
        $user = $usuarios[0]; // Si existe el usuario

        // Verifica si la contraseña es correcta
        if (password_verify($password, $user['password'])) {
            // Si la contraseña es correcta, guarda el ID del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            header("Location: editar.php"); // Redirige al panel de edición o a donde desees
            exit();
        } else {
            $error_message = "Contraseña incorrecta.";
        }
    } else {
        $error_message = "Usuario no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Com - login</title>
    <link rel="stylesheet" href="./css_pages/css_loginPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>
<body>
    <!--Barra de navegación-->
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="">Registrarse</a>
        <a href=""></a>
        <a href=""></a>
        <a href=""></a>
    </nav>
<label class="login-title">Iniciar sesión</label>
    <!-- Mostrar el mensaje de error si existe ----->
    <?php if (!empty($error_message)): ?>
        <div style="color: red;"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>
    <div class="login-form-box">
    <form class="form-login" action="login.php" method="POST">
        <label class="mail-style" for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button class="login-button" type="submit">Iniciar sesión</button>
    </form>
    <p class="login-p">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>
    <script src="./js_linkedPages/js_navbarGeneral.js"></script>
</body>
</html>
