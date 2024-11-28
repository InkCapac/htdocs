<?php
session_start();
// Conexión a la base de datos
include 'conectar.php'; 

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al inicio de sesión si no está autenticado
    header("Location: index.php");
    exit();
}
$id_usuario = $_SESSION['user_id']; 

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
    <!--Favicon-->
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/6020N5e12escaooFy55JlqTYGp43y_0G1c9nfVkfPVjr9-W9iIqgm4L6TKOzDl1bhtF6WH1J=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
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
        <a href="./favorites.php">Favoritos</a>
    </nav>
    <div class="container-gallery">
        <h1 class="title-welcome">¡Bienvenido a los Portfolios</h1>
        <p class="p-show">A continuación, puedes ver los portfolios de nuestros usuarios registrados.</p>

        <?php
        // Verificar si hay portfolios en la base de datos
        if (mysqli_num_rows($result) > 0) {
            // Mostrar cada portfolio de la base de datos
            while ($portfolio = mysqli_fetch_assoc($result)) {
                // Añadí clase para cada portfolio
                echo "<div class='portfolio-item'>"; 
                // Mostrar mensaje de bienvenida con el nombre del usuario
                echo "<h2>" . '' . "</h2>";
                echo "<p class=port-folio><strong>Portfolio de:</strong> " . htmlspecialchars($portfolio['nombre'] . ' ' . $portfolio['apellido1']) . ' ' . $portfolio['apellido2'] . "</p>";
                // Información personal
                echo "<div class='form-section'>";
                echo "<h3 class='info-user'>INFORMACIÓN</h3>";
                /* echo "<p><strong>ID Usuario:</strong> " . htmlspecialchars($portfolio['id_usuario']) . "</p>"; */
                echo "<p><strong>Habilidades:</strong> " . htmlspecialchars($portfolio['habilidades']) . "</p>";
                echo "<p><strong>Experiencia:</strong> " . htmlspecialchars($portfolio['experiencia']) . "</p>";
                echo "<p><strong>Estudios:</strong> " . htmlspecialchars($portfolio['estudios']) . "</p>";
                echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($portfolio['telefono']) . "</p>";
                echo '<p><strong>Enlaces:</strong> <a class="url-color" href="' . htmlspecialchars($portfolio['enlaces'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($portfolio['enlaces'], ENT_QUOTES, 'UTF-8') . '</a></p>';
                echo "<p><strong>Blog:</strong> <a href='" . htmlspecialchars($portfolio['blog']) . "' target='_blank'>" . htmlspecialchars($portfolio['blog']) . "</a></p>";
                echo "<hr>";
                
        
                // Trabajos registrados
                /*echo "<div class='form-section'>";*/
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
                /*echo "</div>";*/
        
                // Testimonio
                /*echo "<div class='form-section'>";*/
                echo "<h3>Testimonio</h3>";
                echo "<p>" . htmlspecialchars($portfolio['testimonio']) . "</p>";
                echo "</div>";
        
                // Botón de Añadir a favoritos
                echo "<form method='post'>";
                echo "<input type='hidden' name='id_portfolio' value='" . $portfolio['id'] . "'>";
                echo "<button class='favourite' type='submit' name='add_favorite'>Añadir a Favoritos</button>";
                echo "</form>";

                /*echo "</div>";*/

                // Cierra el div de Información Personal
                echo "</div>";
                echo "<hr class=\"separate-line\">";
            }
        } else {
            echo "<p>No se encontraron portfolios registrados.</p>";
        }
        ?>
            <button class="log-out" type="submit">Cerrar Sesión</button>
    </div>
</body>

</html>