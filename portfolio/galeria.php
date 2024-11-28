<?php
session_start();
include 'conectar.php'; // Conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) { // Usar 'user_id' en lugar de 'id_usuario' para consistencia
    // Redirigir al inicio de sesión si no está autenticado
    header("Location: index.php");
    exit();
}
$id_usuario = $_SESSION['user_id']; // Asegúrate de que esta variable corresponde al ID correcto

// Inicializar conexión
$conector = new Conectar("localhost", "root", "", "proyect");
$conn = $conector->obtener_conexion();

// Añadir a favoritos
if (isset($_POST['add_favorite'])) {
    $id_portfolio = $_POST['id_portfolio'];

    // Comprobar si ya está en favoritos
    $query = $conn->prepare("SELECT * FROM favoritos WHERE id_usuario = ? AND id_portfolio = ?");
    $query->bind_param("ii", $id_usuario, $id_portfolio);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 0) {
        // Añadir a favoritos
        $stmt = $conn->prepare("INSERT INTO favoritos (id_usuario, id_portfolio) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_usuario, $id_portfolio);
        $stmt->execute();
        echo "Añadido a favoritos.";
    } else {
        echo "Este portafolio ya está en tus favoritos.";
    }
}

// Obtener los portafolios
$query = "SELECT * FROM portfolios";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolios</title>
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_galeria.css">
    <link rel="stylesheet" href="./css_linkedPages/css_navbarGeneral.css">
</head>

<body>
    <!--Barra de navegación-->
    <nav class="grid navbar">
        <a href="#inicio-index">Inicio</a>
        <a href="./registro.php">Registrarse</a>
        <a href=""></a>
        <a href="./galeria.php">Galería</a>
        <a href="">Favoritos</a>
    </nav>
    <div class="container-gallery">
        <h1 class="title-welcome">¡Bienvenido a los Portfolios</h1>
        <p class="p-show">A continuación, puedes ver los portfolios de nuestros usuarios registrados.</p>

        <?php
        // Verificar si hay portfolios en la base de datos
        if (mysqli_num_rows($result) > 0) {
            // Mostrar cada portfolio de la base de datos
            while ($portfolio = mysqli_fetch_assoc($result)) {
                echo "<div class='portfolio-item'>"; // Añadí clase para cada portfolio
                // Mostrar mensaje de bienvenida con el nombre del usuario
                echo "<h2>" . '' . "</h2>";
                echo "<p class=port-folio><strong>Portfolio de:</strong> " . htmlspecialchars($portfolio['nombre'] . ' ' . $portfolio['apellido1']) . ' ' . $portfolio['apellido2'] . "</p>";


                // Información personal
                echo "<div class='form-section'>";
                echo "<h3 class='info-user'>CONTENIDO</h3>";
                echo "<p><strong>ID Usuario:</strong> " . htmlspecialchars($portfolio['id_usuario']) . "</p>";
                echo "<p><strong>Habilidades:</strong> " . htmlspecialchars($portfolio['habilidades']) . "</p>";
                echo "<p><strong>Experiencia:</strong> " . htmlspecialchars($portfolio['experiencia']) . "</p>";
                echo "<p><strong>Estudios:</strong> " . htmlspecialchars($portfolio['estudios']) . "</p>";
                echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($portfolio['telefono']) . "</p>";
                echo "<p><strong>Enlaces:</strong> <a href='" . htmlspecialchars($portfolio['enlaces']) . "' target='_blank'>" . htmlspecialchars($portfolio['enlaces']) . "</a></p>";
                echo "<p><strong>Blog:</strong> <a href='" . htmlspecialchars($portfolio['blog']) . "' target='_blank'>" . htmlspecialchars($portfolio['blog']) . "</a></p>";
                echo "</div>"; // Cierra el div de Información Personal
        
                // Trabajos registrados
                echo "<div class='form-section'>";
                echo "<h3>Trabajos Registrados</h3>";

                // Obtener los trabajos de este portfolio
                $portfolio_id = $portfolio['id']; // Suponiendo que 'id' es el identificador único del portfolio
                $trabajos_query = $conn->prepare("SELECT * FROM trabajos WHERE id_portfolio = ?");
                $trabajos_query->bind_param("i", $portfolio_id);
                $trabajos_query->execute();
                $trabajos_result = $trabajos_query->get_result();

                if ($trabajos_result->num_rows > 0) {
                    while ($trabajo = $trabajos_result->fetch_assoc()) {
                        echo "<p><strong>Trabajo:</strong> " . htmlspecialchars($trabajo['trabajo']) . "</p>";
                        echo "<p><strong>Fecha de Inicio:</strong> " . htmlspecialchars($trabajo['fecha_inicio']) . "</p>";
                        echo "<p><strong>Fecha de Fin:</strong> " . htmlspecialchars($trabajo['fecha_fin']) . "</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "<p>No se encontraron trabajos registrados.</p>";
                }
                echo "</div>";
        
                // Testimonio
                echo "<div class='form-section'>";
                echo "<h3>Testimonio</h3>";
                echo "<p>" . htmlspecialchars($portfolio['testimonio']) . "</p>";
                echo "</div>";
        
                // Botón de Añadir a favoritos
                echo "<form method='post'>";
                echo "<input type='hidden' name='id_portfolio' value='" . $portfolio['id'] . "'>";
                echo "<button class='' type='submit' name='add_favorite'>Añadir a Favoritos</button>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>No se encontraron portfolios registrados.</p>";
        }
        ?>
            <button class="log-out" type="submit">Cerrar Sesión</button>
    </div>
</body>

</html>