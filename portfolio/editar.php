<?php
// Iniciar sesión si es necesario
session_start();

// Eliminar o comentar esta línea antes de la producción
// var_dump($_SESSION); // Eliminar o comentar antes de producción

// Incluir el archivo de conexión a la base de datos
require './conectar.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir a 'index.php' si no está logueado
    header("Location: index.php", true, 302);
    exit();  // Asegúrate de que no continúe ejecutándose después de la redirección
}

// ID de usuario autenticado
$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'] ?? '';  // Usamos una cadena vacía como valor por defecto

// Evitar el caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");

// Conectar con la base de datos
$conexion = new Conectar('localhost', 'root', '', 'proyect');
$conn = $conexion->obtener_conexion();

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del usuario desde la base de datos
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
if (!$user) {
    echo "Usuario no encontrado.";
    session_destroy(); // Opcional, para forzar un cierre de sesión
    header("Location: index.php");
    exit();
}

// Mostrar los datos en el cuadro (con seguridad)
echo "<div style='border: 1px solid #ccc; padding: 20px; margin-top: 20px;'>";
echo "<h3>Detalles del usuario</h3>";
echo "<p><strong>ID de usuario:</strong> " . htmlspecialchars($user['id']) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
// No mostrar la contraseña en texto claro. Mejor eliminar esta línea o sustituir por un campo oculto
echo "</div>";

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario (filtrando y sanitizando adecuadamente)
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

    // Insertar los datos adicionales en la tabla portfolios
    $stmt_portfolio = $conn->prepare("INSERT INTO portfolios (id_usuario, nombre, apellido1, apellido2, biografia, habilidades, experiencia, estudios, categoria, testimonio, telefono, enlaces, blog) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_portfolio->bind_param("issssssssssss", $user_id, $nombre, $apellido1, $apellido2, $biografia, $habilidades, $experiencia, $estudios, $categoria, $testimonio, $telefono, $enlaces, $blog);
    $stmt_portfolio->execute();

    // Obtener el ID del portfolio insertado
    $id_portfolio = $conn->insert_id; // Reemplaza este valor con el valor real (por ejemplo, de la sesión o consulta anterior)

    // Verificar si se obtuvo correctamente el ID
    if ($id_portfolio <= 0) {
        echo "Error: No se pudo obtener el ID del portfolio.";
        exit();
    }

    // Obtener los datos de los trabajos y fechas
    $trabajos = $_POST['trabajos'] ?? [];
    $fechas_inicio = $_POST['fechas_inicio'] ?? []; // Fecha de inicio
    $fechas_fin = $_POST['fechas_fin'] ?? []; // Fecha de fin

    // Preparamos la sentencia para insertar los trabajos
    $stmt_trabajos = $conn->prepare("INSERT INTO trabajos (id_portfolio, id_usuario, trabajo, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");

    // Insertamos los trabajos y las fechas en la base de datos
    for ($i = 0; $i < count($trabajos); $i++) {
        $trabajo = htmlspecialchars($trabajos[$i], ENT_QUOTES, 'UTF-8');
        $fecha_inicio = !empty($fechas_inicio[$i]) ? DateTime::createFromFormat('Y-m-d', $fechas_inicio[$i])->format('Y-m-d') : null; // Validación de fecha de inicio
        $fecha_fin = !empty($fechas_fin[$i]) ? DateTime::createFromFormat('Y-m-d', $fechas_fin[$i])->format('Y-m-d') : null; // Validación de fecha de fin

        // Ejecutamos la sentencia para cada trabajo
        $stmt_trabajos->bind_param("iisss", $id_portfolio, $user_id, $trabajo, $fecha_inicio, $fecha_fin);
        if (!$stmt_trabajos->execute()) {
            echo "Error al insertar el trabajo: " . $stmt_trabajos->error;
            exit();
        }
    }

    // Confirmación de éxito
    echo "Trabajos insertados correctamente.";
    // Redirigir o limpiar la pantalla después de la inserción si es necesario
    // header("Location: editar.php"); exit();
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
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_registerContent.css">
    <link rel="stylesheet" href="./css_pages/css_registerPage.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <!--
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="">Galería</a>
        <a href=""></a>
        <a href=""></a>
        <a href="">Favoritos</a>
    </nav>
    -->
    <div class="container">
        <form action="#" method="POST">
            <!-- Sección de Presentación personal -->
            <div class="form-section">
                <h2>Presentación Personal</h2>
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

            <!-- Repite para trabajo2 y trabajo3 
                    <div class="field-group">
                        <label for="trabajo2">Trabajo 2 (Descripción y enlace):</label>
                        <textarea id="trabajo2" name="trabajo2"></textarea>
                        <label for="fecha_inicio2">Fecha de inicio:</label>
                        <input class="time-date" type="date" id="fecha_inicio2" name="fecha_inicio2" required>
                        <label for="fecha_fin2">Fecha de fin:</label>
                        <input class="time-date" type="date" id="fecha_fin2" name="fecha_fin2" required>
                    </div>
                    <div class="field-group">
                        <label for="trabajo2">Trabajo 3 (Descripción y enlace):</label>
                        <textarea id="trabajo3" name="trabajo3"></textarea>
                        <label for="fecha_inicio3">Fecha de inicio:</label>
                        <input class="time-date" type="date" id="fecha_inicio3" name="fecha_inicio3" required>
                        <label for="fecha_fin3">Fecha de fin:</label>
                        <input class="time-date" type="date" id="fecha_fin3" name="fecha_fin3" required>
                    </div>
                    <div class="field-group">
                        <label for="categoria">Categoría de Trabajos:</label>
                        <select id="categoria" name="categoria">
                            <option value="diseno">Diseño Gráfico</option>
                            <option value="desarrollo">Desarrollo Web</option>
                            <option value="fotografia">Fotografía</option>
                        </select>
                    </div>
                    -->

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

            <button type="submit">Registrarse</button>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?= $error_message; ?></div>
            <?php endif; ?>
        </form>
    </div>
    <a style="font-size: xx-large; cursor:pointer" href="logout.php">Cerrar sesión</a>
    <!-- ARCHIVOS JavaScript-->

    <script src="./js_linkedPages/js_trabajosContent.js"></script>
</body>

</html>