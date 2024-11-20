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
    $nombre = $_POST['nombre'];
    $biografia = $_POST['biografia'];
    $habilidades = $_POST['habilidades'];
    $experiencia = $_POST['experiencia'];
    $estudios = $_POST['estudios'];
    $trabajo1 = $_POST['trabajo1'];
    $trabajo2 = $_POST['trabajo2'];
    $trabajo3 = $_POST['trabajo3'];
    $categoria = $_POST['categoria'];
    $testimonio = $_POST['testimonio'];
    $telefono = $_POST['telefono'];
    $enlaces = $_POST['enlaces'];
    $blog = $_POST['blog'];

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
        $stmt = $conn->prepare("INSERT INTO usuarios (email, password, nombre, biografia, habilidades, experiencia, estudios, trabajo1, trabajo2, trabajo3, categoria, testimonio, telefono, enlaces, blog) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $email, $hashed_password, $nombre, $biografia, $habilidades, $experiencia, $estudios, $trabajo1, $trabajo2, $trabajo3, $categoria, $testimonio, $telefono, $enlaces, $blog);
        
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
    <!--Font de la página-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_registerContent.css">
    <link rel="stylesheet" href="./css_pages/css_registerPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href=""></a>
        <a href=""></a>
        <a href="">Galería</a>
        <a href="">Favoritos</a>
    </nav>
    <div class="container">
        <form action="#" method="POST">
            <!-- Sección de Presentación personal -->
            <div class="form-section">
                <h2>Presentación Personal</h2>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="biografia">Biografía:</label>
                <textarea id="biografia" name="biografia" rows="4" required></textarea>

                <label for="habilidades">Habilidades:</label>
                <input type="text" id="habilidades" name="habilidades" placeholder="Ej: HTML, CSS, JavaScript, etc."
                    required>

                <label for="experiencia">Experiencia Laboral:</label>
                <textarea id="experiencia" name="experiencia" rows="4"></textarea>

                <label for="estudios">Estudios Relevantes:</label>
                <input type="text" id="estudios" name="estudios">
            </div>

            <!-- Sección de Galería de trabajos -->
            <div class="form-section">
                <h2>Galería de Trabajos</h2>
                <label for="trabajo1">Trabajo 1 (Descripción y enlace):</label>
                <textarea id="trabajo1" name="trabajo1" rows="4"
                    placeholder="Descripción, enlaces o imágenes"></textarea>

                <label for="trabajo2">Trabajo 2 (Descripción y enlace):</label>
                <textarea id="trabajo2" name="trabajo2" rows="4"></textarea>

                <label for="trabajo3">Trabajo 3 (Descripción y enlace):</label>
                <textarea id="trabajo3" name="trabajo3" rows="4"></textarea>

                <label for="categoria">Categoría de Trabajos:</label>
                <select id="categoria" name="categoria">
                    <option value="diseno">Diseño Gráfico</option>
                    <option value="desarrollo">Desarrollo Web</option>
                    <option value="fotografia">Fotografía</option>
                </select>
            </div>

            <!-- Sección de Testimonios -->
            <div class="form-section">
                <h2>Testimonios</h2>
                <textarea id="testimonio" name="testimonio" rows="4" placeholder="Comentarios de clientes o colegas"></textarea>
            </div>

            <!-- Información de contacto -->
            <div class="form-section">
                <h2>Información de Contacto</h2>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>

                <label for="enlaces">Enlaces adicionales (LinkedIn, GitHub, etc.):</label>
                <input type="url" id="enlaces" name="enlaces">

                <label for="blog">Blog (opcional):</label>
                <input type="url" id="blog" name="blog">
            </div>

            <button type="submit">Registrarse</button>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?= $error_message; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
