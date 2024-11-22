<?php
session_start(); // Inicia la sesión

// Verificar si la sesión ya está iniciada
if (isset($_SESSION['user_id'])) {
    header("Location: editar.php"); // Redirige al panel de edición
    exit();
}

// Incluir archivo de conexión
require 'conectar.php';

// Configuración de conexión
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "proyect";

// Instanciar la conexión
$conn = new Conectar($servidor, $usuario, $contrasena, $bbdd);

$error_message = ""; // Mensaje de error inicializado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar entrada
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verificar que no estén vacíos
    if (!empty($email) && !empty($password)) {
        // Consulta preparada para buscar usuario por email
        $consulta = "SELECT * FROM usuarios WHERE email = ?";
        $usuarios = $conn->recibir_datos($consulta, 's', [$email]);

        if ($usuarios) {
            $user = $usuarios[0]; // Usuario encontrado

            // Verificar contraseña
            if (password_verify($password, $user['password'])) {
                // Guardar sesión y redirigir
                $_SESSION['user_id'] = $user['id'];
                header("Location: editar.php");
                exit();
            } else {
                $error_message = "Contraseña incorrecta.";
            }
        } else {
            $error_message = "Usuario no encontrado.";
        }
    } else {
        $error_message = "Por favor, completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Com - Login</title>
    <link rel="stylesheet" href="./css_pages/css_loginPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="registro.php">Galería</a>
        <a href="#">Sobre nosotros</a>
        <a href="#"></a>
        <a href="#">Favoritos</a>
    </nav>

    <label class="login-title">Iniciar sesión</label>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (!empty($error_message)): ?>
    <div class="error-message" style="color: red;">
        <?= htmlspecialchars($error_message) ?>
    </div>
    <?php endif; ?>

    <!-- Formulario de inicio de sesión -->
    <div class="login-form-box">
        <form class="form-login" action="login.php" method="POST">
            <label class="mail-style" for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="Ingresa tu correo">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
            <br>
            <button class="login-button" type="submit">Iniciar sesión</button>
        </form>
        <p class="login-p">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>

    <script src="./js_linkedPages/js_navbarGeneral.js"></script>
    <script>
        // Validación de email en el cliente
        document.querySelector('.form-login').addEventListener('submit', function(e) {
            const email = document.querySelector('#email').value;
            if (!email.includes('@')) {
                e.preventDefault();
                alert('Por favor, ingresa un correo electrónico válido.');
            }
        });
    </script>
</body>

</html>
