<?php
require 'conexion.php';

$id_usuario = $_GET['id'] ?? null;
if ($id_usuario) {
    $stmt = $conn->prepare("SELECT * FROM portfolios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row['titulo']) . "</h2>";
        echo "<p>" . nl2br(htmlspecialchars($row['contenido'])) . "</p>";
    }
} else {
    echo "Usuario no encontrado.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Portfolio</title>
</head>
<body>
    <h1>Portfolio Público</h1>
    <!-- Aquí se mostrarán los bloques del portfolio -->
    <?php
    if (isset($bloques)) {
        foreach ($bloques as $bloque) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($bloque['titulo']) . "</h2>";
            echo "<p>" . nl2br(htmlspecialchars($bloque['contenido'])) . "</p>";
            echo "<button onclick='añadirFavorito({$bloque['id']})'>Añadir a Favoritos</button>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontró el portfolio.</p>";
    }
    ?>
    <script>
        function añadirFavorito(id) {
            let favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];
            if (!favoritos.includes(id)) {
                favoritos.push(id);
                localStorage.setItem("favoritos", JSON.stringify(favoritos));
                alert("Añadido a favoritos");
            }
        }
    </script>
</body>
</html>
