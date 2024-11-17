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
            header("Location: login.php");
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
    <style>
        /* Estilos básicos para el formulario */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0b7dda;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .success-message {
            color: green;
            font-size: 1.1em;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
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

        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
