<?php
// Iniciar sesión si es necesario
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
// Verificar si el usuario está logueado
if (isset($_SESSION['user_id'])) {
    // El usuario está logueado
    echo "Bienvenido al panel de edición, Usuario con ID: " . $_SESSION['user_id'];
} else {
    // El usuario no está logueado, redirigir al login (index.php)
    header("Location: index.php");
    exit();
}

// Función para validar fechas
function validarFecha($fecha)
{
    $d = DateTime::createFromFormat('Y-m-d', $fecha);
    return $d && $d->format('Y-m-d') === $fecha;
}

// Conectar con la base de datos
require './conectar.php';
$conexion = new Conectar('localhost', 'root', '', 'proyect');

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario (filtrando y sanitizando adecuadamente)
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $apellido1 = htmlspecialchars($_POST['apellido1'], ENT_QUOTES, 'UTF-8');
    $apellido2 = htmlspecialchars($_POST['apellido2'], ENT_QUOTES, 'UTF-8');
    $biografia = htmlspecialchars($_POST['biografia'], ENT_QUOTES, 'UTF-8');
    $habilidades = htmlspecialchars($_POST['habilidades'], ENT_QUOTES, 'UTF-8');
    $experiencia = htmlspecialchars($_POST['experiencia'], ENT_QUOTES, 'UTF-8');
    $estudios = htmlspecialchars($_POST['estudios'], ENT_QUOTES, 'UTF-8');
    $trabajo1 = htmlspecialchars($_POST['trabajo1'], ENT_QUOTES, 'UTF-8');
    $trabajo2 = htmlspecialchars($_POST['trabajo2'], ENT_QUOTES, 'UTF-8');
    $trabajo3 = htmlspecialchars($_POST['trabajo3'], ENT_QUOTES, 'UTF-8');
    $categoria = htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8');
    $testimonio = htmlspecialchars($_POST['testimonio'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $enlaces = htmlspecialchars($_POST['enlaces'], ENT_QUOTES, 'UTF-8');
    $blog = htmlspecialchars($_POST['blog'], ENT_QUOTES, 'UTF-8');
    
    // Fechas (deben ser opcionales, por lo que solo los asignamos si están presentes)
    $fecha_inicio1 = $_POST['fecha_inicio1'] ?? null;
    $fecha_fin1 = $_POST['fecha_fin1'] ?? null;
    $fecha_inicio2 = $_POST['fecha_inicio2'] ?? null;
    $fecha_fin2 = $_POST['fecha_fin2'] ?? null;
    $fecha_inicio3 = $_POST['fecha_inicio3'] ?? null;
    $fecha_fin3 = $_POST['fecha_fin3'] ?? null;

    $error_message = []; // Array para almacenar los mensajes de error

    // Validaciones para campos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message[] = "Correo electrónico no válido."; // Añadir el mensaje al array
    }
    if (strlen($password) < 6) {
        $error_message[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    if (!is_numeric($telefono) || strlen($telefono) < 10) {
        $error_message[] = "El teléfono debe ser numérico y contener al menos 10 dígitos.";
    }

    // Validaciones de fechas (se agrupan para no repetir el código)
    $fechas = [
        ['inicio' => $fecha_inicio1, 'fin' => $fecha_fin1],
        ['inicio' => $fecha_inicio2, 'fin' => $fecha_fin2],
        ['inicio' => $fecha_inicio3, 'fin' => $fecha_fin3],
    ];
    foreach ($fechas as $i => $fecha) {
        if ($fecha['inicio'] && !validarFecha($fecha['inicio'])) {
            $error_message[] = "La fecha de inicio " . ($i+1) . " no es válida.";
        }
        if ($fecha['fin'] && !validarFecha($fecha['fin'])) {
            $error_message[] = "La fecha de fin " . ($i+1) . " no es válida.";
        }
        if ($fecha['inicio'] && $fecha['fin'] && $fecha['inicio'] > $fecha['fin']) {
            $error_message[] = "La fecha de inicio " . ($i+1) . " no puede ser posterior a la fecha de fin.";
        }
    }

    // Si hay errores, se muestra un mensaje
    if (!empty($error_message)) {
        echo "<p style='color: red;'>" . implode("<br>", $error_message) . "</p>";
    } else {
        // Si no hay errores, procesar la inserción en la base de datos
        // Generar el hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $conn = $conexion->obtener_conexion();

        // Verificar si el correo ya está registrado
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Si ya está registrado, mostrar un mensaje de error
            echo "El correo ya está registrado.";
        } else {
            // Si no está registrado, insertar al usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (email, password, nombre, apellido1, apellido2, biografia, habilidades, experiencia, estudios, trabajo1, trabajo2, trabajo3, categoria, testimonio, telefono, enlaces, blog) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssssssss", $email, $hashed_password, $nombre, $apellido1, $apellido2, $biografia, $habilidades, $experiencia, $estudios, $trabajo1, $trabajo2, $trabajo3, $categoria, $testimonio, $telefono, $enlaces, $blog);

            if ($stmt->execute()) {
                $user_id = $conn->insert_id; // Obtener el ID del usuario recién creado

                // Insertar los periodos
                $periodos = [
                    ['inicio' => $fecha_inicio1, 'fin' => $fecha_fin1],
                    ['inicio' => $fecha_inicio2, 'fin' => $fecha_fin2],
                    ['inicio' => $fecha_inicio3, 'fin' => $fecha_fin3],
                ];

                $stmt_periodo = $conn->prepare("INSERT INTO periodos (id_usuario, fecha_inicio1, fecha_fin1, fecha_inicio2, fecha_fin2, fecha_inicio3, fecha_fin3) VALUES (?, ?, ?, ?, ?, ?, ?)");
                foreach ($periodos as $periodo) {
                    if ($periodo['inicio'] && $periodo['fin']) {
                        $stmt_periodo->bind_param("issssss", $user_id, $periodo['inicio'], $periodo['fin'], $periodo['inicio'], $periodo['fin'], $periodo['inicio'], $periodo['fin']);
                        $stmt_periodo->execute();
                    }
                }

                // Redirigir al login si el registro es exitoso
                header("Location: login.php");
                exit();
            } else {
                echo "Error al registrar el usuario. Intente nuevamente." . $stmt->error;
            }
        }
    }
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
                        <label for="trabajo1">Trabajo 1 (Descripción y enlace):</label>
                        <textarea id="trabajo1" name="trabajo1"></textarea>
                        <label for="fecha_inicio1">Fecha de inicio:</label>
                        <input class="time-date" type="date" id="fecha_inicio1" name="fecha_inicio1" required>
                        <label for="fecha_fin1">Fecha de fin:</label>
                        <input class="time-date" type="date" id="fecha_fin1" name="fecha_fin1" required>
                    </div>
                    <!-- Repite para trabajo2 y trabajo3 -->
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

            <button type="submit">Registrarse</button>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?= $error_message; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>