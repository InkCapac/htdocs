<?php
ob_start();  // Inicia el almacenamiento en búfer de la salida
session_start();  // Inicia la sesión
require './conectar.php';  // Incluye el archivo de conexión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php", true, 302);  // Redirige si no está autenticado
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Crear la conexión a la base de datos
$conexion = new Conectar('localhost', 'root', '', 'proyect');
$conn = $conexion->obtener_conexion();

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);  // Si la conexión falla, muestra un error
}

// Verificar si se recibe un ID de portafolio
$portfolio_id = $_GET['id'] ?? null;

if (!$portfolio_id) {
    die("ID de portafolio no proporcionado.");  // Si no se recibe el ID del portafolio, muestra un mensaje de error
}

// Obtener los datos del portafolio
$stmt = $conn->prepare("SELECT * FROM portfolios WHERE id_usuario = ? AND id = ?");
$stmt->bind_param("ii", $user_id, $portfolio_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Portafolio no encontrado o no autorizado.");  // Si no se encuentra el portafolio, muestra un mensaje de error
}

$portfolio = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario y asegurarse de escapar los valores
    $nombre = htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido1 = htmlspecialchars($_POST['apellido1'] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido2 = htmlspecialchars($_POST['apellido2'] ?? '', ENT_QUOTES, 'UTF-8');
    $biografia = htmlspecialchars($_POST['biografia'] ?? '', ENT_QUOTES, 'UTF-8');
    $habilidades = htmlspecialchars($_POST['habilidades'] ?? '', ENT_QUOTES, 'UTF-8');
    $experiencia = htmlspecialchars($_POST['experiencia'] ?? '', ENT_QUOTES, 'UTF-8');
    $estudios = htmlspecialchars($_POST['estudios'] ?? '', ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'] ?? '', ENT_QUOTES, 'UTF-8');
    $enlaces = htmlspecialchars($_POST['enlaces'] ?? '', ENT_QUOTES, 'UTF-8');
    $blog = htmlspecialchars($_POST['blog'] ?? '', ENT_QUOTES, 'UTF-8');
    // Actualizar los datos en la tabla portfolios
    $stmt_update = $conn->prepare("UPDATE portfolios SET nombre = ?, apellido1 = ?, apellido2 = ?, biografia = ?, habilidades = ?, experiencia = ?, estudios = ?, telefono = ?, enlaces = ?, blog = ?, fecha_inicio = ?, fecha_fin = ? WHERE id = ? AND id_usuario = ?");
    $stmt_update->bind_param("ssssssssssssi", $nombre, $apellido1, $apellido2, $biografia, $habilidades, $experiencia, $estudios, $telefono, $enlaces, $blog);
    // Nuevas fechas
    $fecha_inicio = htmlspecialchars($_POST['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8');
    $fecha_fin = htmlspecialchars($_POST['fecha_fin'] ?? '', ENT_QUOTES, 'UTF-8');



    if ($stmt_update->execute()) {
        header("Location: portfolioContent.php?id=$portfolio_id", true, 302);  // Redirige si la actualización es exitosa
        exit();
    } else {
        // Registrar el error en el log para poder depurar
        error_log("Error al actualizar el portafolio: " . $stmt_update->error);
        echo "Error al actualizar el portafolio.";  // Muestra un mensaje si hubo un error
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contenido - Portafolio</title>
    <link rel="stylesheet" href="./css_pages/css_registerContent.css">
    <link rel="stylesheet" href="./css_pages/css_registerPage.css">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_editarPortfolio.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <nav class="grid navbar">
        <a href="./index.php">Inicio</a>
        <a href="./registro.php">Registrarse</a>
        <img src="" alt="" srcset="">
        <a href="galeria.php">Galería</a>
        <a href="favorites.php">Favoritos</a>
    </nav>
    <div class="edit-container">
        <form action="" method="POST">
            <div class="form-section">
                <h2>Editar Portafolio</h2>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($portfolio['nombre'], ENT_QUOTES, 'UTF-8') ?>" required>

                <label for="apellido1">Primer apellido:</label>
                <input type="text" id="apellido1" name="apellido1" value="<?= htmlspecialchars($portfolio['apellido1'], ENT_QUOTES, 'UTF-8') ?>" required>

                <label for="apellido2">Segundo apellido:</label>
                <input type="text" id="apellido2" name="apellido2" value="<?= htmlspecialchars($portfolio['apellido2'], ENT_QUOTES, 'UTF-8') ?>" required>

                <label for="biografia">Biografía:</label>
                <textarea id="biografia" name="biografia" rows="4"><?= htmlspecialchars($portfolio['biografia'], ENT_QUOTES, 'UTF-8') ?></textarea>

                <label for="habilidades">Habilidades:</label>
                <input type="text" id="habilidades" name="habilidades" value="<?= htmlspecialchars($portfolio['habilidades'], ENT_QUOTES, 'UTF-8') ?>">

                <label for="experiencia">Experiencia:</label>
                <textarea id="experiencia" name="experiencia" rows="4"><?= htmlspecialchars($portfolio['experiencia'], ENT_QUOTES, 'UTF-8') ?></textarea>

                <label for="estudios">Estudios:</label>
                <input type="text" id="estudios" name="estudios" value="<?= htmlspecialchars($portfolio['estudios'], ENT_QUOTES, 'UTF-8') ?>">

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($portfolio['telefono'], ENT_QUOTES, 'UTF-8') ?>" required>

                <label for="enlaces">Enlaces:</label>
                <input type="url" id="enlaces" name="enlaces" value="<?= htmlspecialchars($portfolio['enlaces'], ENT_QUOTES, 'UTF-8') ?>">

                <label for="blog">Blog:</label>
                <input type="url" id="blog" name="blog" value="<?= htmlspecialchars($portfolio['blog'], ENT_QUOTES, 'UTF-8') ?>">

                <!-- Nuevos campos de fecha -->
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= htmlspecialchars($trabajo['fecha_inicio'], ENT_QUOTES, 'UTF-8') ?>">

                <label for="fecha_fin">Fecha de finalización:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="<?= htmlspecialchars($trabajo['fecha_fin'], ENT_QUOTES, 'UTF-8') ?>">

                <button type="submit">Guardar Cambios</button>
            </div>
        </form>
    </div>
    <script src="./js_linkedPages/js_navbarGeneral.js"></script>
</body>

</html>