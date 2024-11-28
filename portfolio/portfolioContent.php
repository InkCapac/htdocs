<?php
include 'conectar.php';

try {
    // Crear instancia de la clase Conectar
    $conexion = new Conectar('localhost', 'root', '', 'proyect');
    $conn = $conexion->obtener_conexion();

    // Verificar si se ha pasado el parámetro 'id' por GET
    if (isset($_GET['id'])) {
        $portfolio_id = $_GET['id'];

        // Consultar el portfolio y los trabajos relacionados
        $stmt = $conn->prepare("
            SELECT p.id AS portfolio_id, p.id_usuario, p.nombre, p.apellido1, p.apellido2, p.biografia, p.habilidades, p.experiencia, p.estudios, p.categoria, p.testimonio, p.telefono, p.enlaces, p.blog, t.id AS trabajo_id, t.trabajo, t.fecha_inicio, t.fecha_fin FROM portfolios p LEFT JOIN trabajos t ON p.id = t.id_portfolio WHERE p.id = ? ");
        $stmt->bind_param("i", $portfolio_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            $portfolio_data = [];
            while ($row = $result->fetch_assoc()) {
                $portfolio_data[] = $row;
            }

            // Obtener datos del portfolio (de la primera fila)
            $portfolio = $portfolio_data[0];
        } else {
            echo "No se encontró el portfolio para el ID especificado.";
            exit();
        }
    } else {
        echo "No se ha especificado un ID de usuario en la URL.";
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Completado</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/6020N5e12escaooFy55JlqTYGp43y_0G1c9nfVkfPVjr9-W9iIqgm4L6TKOzDl1bhtF6WH1J=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <!--Archivos css-->
    <link rel="stylesheet" href="./css_pages/css_portfolioContent.css">
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
    <div class="container">
        <h1>¡Gracias por registrarte, <?php echo htmlspecialchars($portfolio['nombre']); ?>!</h1>
        <p>Detalles del portfolio:</p>

        <div class="form-section">
            <h2>Información Personal</h2>
            <p><strong>ID Usuario:</strong> <?php echo htmlspecialchars($portfolio['id_usuario']); ?></p>
            <p><strong>Biografía:</strong> <?php echo htmlspecialchars($portfolio['biografia']); ?></p>
            <p><strong>Habilidades:</strong> <?php echo htmlspecialchars($portfolio['habilidades']); ?></p>
            <p><strong>Experiencia:</strong> <?php echo htmlspecialchars($portfolio['experiencia']); ?></p>
            <p><strong>Estudios:</strong> <?php echo htmlspecialchars($portfolio['estudios']); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($portfolio['telefono']); ?></p>
            <p><strong>Enlaces:</strong> <a href="<?php echo htmlspecialchars($portfolio['enlaces']); ?>"
                    target="_blank"><?php echo htmlspecialchars($portfolio['enlaces']); ?></a></p>
            <p><strong>Blog:</strong> <a href="<?php echo htmlspecialchars($portfolio['blog']); ?>"
                    target="_blank"><?php echo htmlspecialchars($portfolio['blog']); ?></a></p>
        </div>

        <div class="form-section">
            <h2>Trabajos Registrados</h2>
            <?php
            if (count($portfolio_data) > 0) {
                foreach ($portfolio_data as $trabajo) {
                    if (!empty($trabajo['trabajo'])) {
                        echo "<p><strong>Trabajo:</strong> " . htmlspecialchars($trabajo['trabajo']) . "</p>";
                        echo "<p><strong>Fecha de Inicio:</strong> " . htmlspecialchars($trabajo['fecha_inicio']) . "</p>";
                        echo "<p><strong>Fecha de Fin:</strong> " . htmlspecialchars($trabajo['fecha_fin']) . "</p>";
                        echo "<hr>";
                    }
                }
            } else {
                echo "<p>No se encontraron trabajos registrados.</p>";
            }
            ?>
        </div>

        <div class="form-section">
            <h2>Testimonio</h2>
            <p><?php echo htmlspecialchars($portfolio['testimonio']); ?></p>
        </div>

        <!-- Botón de Cerrar sesión -->
        <a style="font-size: xx-large; cursor:pointer" href="logout.php">Cerrar sesión</a>
        </form>
    </div>
    <script src="./js_linkedPages/js_navbarGeneral.js"></script>
</body>

</html>