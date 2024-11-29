<?php
session_start();
require './conectar.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al inicio de sesión si no hay una sesión activa
    header("Location: index.php", true, 302);
    exit();
}

// Evitar almacenamiento en caché de la página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Crear la conexión a la base de datos
$conexion = new Conectar('localhost', 'root', '', 'proyect');
$conn = $conexion->obtener_conexion();

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar la consulta para obtener los datos del usuario
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe
if ($result->num_rows === 0) {
    // Si el usuario no existe, destruir la sesión y redirigir al inicio de sesión
    session_unset();
    session_destroy();
    header("Location: index.php", true, 302);
    exit();
}

// Si el usuario existe, obtener los datos
$user = $result->fetch_assoc();

// Variable para verificar el éxito del registro
$registro_exitoso = false;
// Procesar la subida de la imagen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se ha subido una imagen
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        // Obtener información de la imagen subida
        $imagen = $_FILES['foto_perfil'];
        $nombre_imagen = $imagen['name'];
        $tipo_imagen = $imagen['type'];
        $ruta_imagen_temporal = $imagen['tmp_name'];

        // Verificar que la imagen sea de un tipo permitido (JPEG o PNG)
        if ($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/png') {
            // Crear una imagen desde el archivo subido
            if ($tipo_imagen == 'image/jpeg') {
                $img = imagecreatefromjpeg($ruta_imagen_temporal);
            } elseif ($tipo_imagen == 'image/png') {
                $img = imagecreatefrompng($ruta_imagen_temporal);
            }

            // Redimensionar la imagen (por ejemplo, 150x150 px)
            $ancho_nuevo = 150;
            $alto_nuevo = 150;
            $img_redimensionada = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
            imagecopyresampled($img_redimensionada, $img, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, imagesx($img), imagesy($img));

            // Definir la ruta donde se guardará la imagen
            $directorio_destino = './imagenes_perfil'; // Ajusta esta ruta a tu carpeta de imágenes
            $nombre_archivo_destino = uniqid('perfil_', true) . '.jpg'; // Generar un nombre único para la imagen

            // Guardar la imagen redimensionada en el servidor
            imagejpeg($img_redimensionada, $directorio_destino . $nombre_archivo_destino, 90); // 90 es la calidad de la imagen

            // Liberar la memoria
            imagedestroy($img);
            imagedestroy($img_redimensionada);

            // Aquí se guarda el nombre de la imagen en la tabla `portfolios` (suponiendo que ya tienes el id_usuario)
            // Ejemplo: $id_usuario es el ID del usuario actual

            $id_usuario = 1; // Obtén el ID del usuario de sesión o de alguna otra fuente
            $stmt = $conn->prepare("UPDATE portfolios SET imagen_perfil = ? WHERE id_usuario = ?");
            $stmt->bind_param("si", $nombre_archivo_destino, $id_usuario);
            $stmt->execute();
        } else {
            echo "Solo se permiten imágenes en formato JPEG o PNG.";
        }
    }

    // Aquí sigue el resto del procesamiento del formulario
}
// Procesar el formulario solo si se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido1 = htmlspecialchars($_POST['apellido1'] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido2 = htmlspecialchars($_POST['apellido2'] ?? '', ENT_QUOTES, 'UTF-8');
    $biografia = htmlspecialchars($_POST['biografia'] ?? '', ENT_QUOTES, 'UTF-8');
    $habilidades = htmlspecialchars($_POST['habilidades'] ?? '', ENT_QUOTES, 'UTF-8');
    $experiencia = htmlspecialchars($_POST['experiencia'] ?? '', ENT_QUOTES, 'UTF-8');
    $estudios = htmlspecialchars($_POST['estudios'] ?? '', ENT_QUOTES, 'UTF-8');
    $categoria = htmlspecialchars($_POST['categoria'] ?? '', ENT_QUOTES, 'UTF-8');
    $testimonio = htmlspecialchars($_POST['testimonio'] ?? '', ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'] ?? '', ENT_QUOTES, 'UTF-8');
    $enlaces = htmlspecialchars($_POST['enlaces'] ?? '', ENT_QUOTES, 'UTF-8');
    $blog = htmlspecialchars($_POST['blog'] ?? '', ENT_QUOTES, 'UTF-8');

    // Insertar datos en la tabla portfolios
    $stmt_portfolio = $conn->prepare("INSERT INTO portfolios (id_usuario, nombre, apellido1, apellido2, biografia, habilidades, experiencia, estudios, categoria, testimonio, telefono, enlaces, blog) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_portfolio->bind_param("issssssssssss", $user_id, $nombre, $apellido1, $apellido2, $biografia, $habilidades, $experiencia, $estudios, $categoria, $testimonio, $telefono, $enlaces, $blog);

    if ($stmt_portfolio->execute()) {
        $id_portfolio = $conn->insert_id;

        if ($id_portfolio > 0) {
            $trabajos = $_POST['trabajos'] ?? [];
            $fechas_inicio = $_POST['fechas_inicio'] ?? [];
            $fechas_fin = $_POST['fechas_fin'] ?? [];

            $stmt_trabajos = $conn->prepare("INSERT INTO trabajos (id_portfolio, id_usuario, trabajo, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");

            $registro_exitoso = true;

            for ($i = 0; $i < count($trabajos); $i++) {
                $trabajo = htmlspecialchars($trabajos[$i], ENT_QUOTES, 'UTF-8');
                $fecha_inicio = !empty($fechas_inicio[$i]) ? $fechas_inicio[$i] : null;
                $fecha_fin = !empty($fechas_fin[$i]) ? $fechas_fin[$i] : null;

                $stmt_trabajos->bind_param("iisss", $id_portfolio, $user_id, $trabajo, $fecha_inicio, $fecha_fin);

                if (!$stmt_trabajos->execute()) {
                    $registro_exitoso = false;
                    error_log("Error al insertar trabajo: " . $stmt_trabajos->error);
                    break;
                }
            }
        }
    } else {
        error_log("Error en portfolio: " . $stmt_portfolio->error);
    }
}

// Redirigir si todo salió bien
if ($registro_exitoso) {
    header("Location: portfolioContent.php?id=$id_portfolio", true, 302);
    exit();
} else {
    echo "Error: No se pudo completar el registro.";
}
?>

<!--INICIO DEL CONTENIDO DE HTML-->
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
    <!--Favicon-->
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/6020N5e12escaooFy55JlqTYGp43y_0G1c9nfVkfPVjr9-W9iIqgm4L6TKOzDl1bhtF6WH1J=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_registerContent.css">
    <link rel="stylesheet" href="./css_pages/css_registerPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="">Galería</a>
        <a href=""></a>
        <a href=""></a>
        <a href="">Favoritos</a>
    </nav>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- Sección de Presentación personal -->
            <div class="form-section">
                <h2>INFORMACIÓN</h2>
                <div class="personal-info">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="apellido1">Primer apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" required>
                    <label for="apellido2">Segundo apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" required>
                </div>

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

            <!-- Campo para cargar la imagen 
            <label for="foto_perfil">Subir imagen de perfil:</label>
            <input type="file" name="foto_perfil" id="foto_perfil" required>
-->
            <!-- Sección de Galería de trabajos -->
            <div class="form-section">
                <h2>Galería de Trabajos</h2>
                <div class="jobs-info">
                    <div class="field-group">
                        <div id="trabajos-container">
                            <button type="button" onclick="anadirTrabajo()">Agregar Trabajo</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Testimonios -->
            <div class="form-section">
                <h2>Testimonios</h2>
                <textarea id="testimonio" name="testimonio" rows="4"
                    placeholder="Comentarios de clientes o colegas"></textarea>
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

            <button type="submit">Registrar</button>
        </form>

    </div>
    <a style="font-size: xx-large; cursor:pointer" href="logout.php">Cerrar sesión</a>
    <!-- ARCHIVOS JavaScript-->

    <script src="./js_linkedPages/js_trabajosContent.js"></script>
</body>

</html>