<?php
ini_set('session.cookie_secure', 0); // Asegúrate de que esta línea esté configurada correctamente
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'conectar.php';

$id_usuario = $_SESSION['user_id'];
$mensaje = "";

// Lógica para añadir, editar o eliminar bloques
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        // Añadir un nuevo bloque
        if ($_POST['accion'] == 'añadir') {
            $titulo = trim($_POST['titulo']);
            $contenido = trim($_POST['contenido']);

            // Validación básica
            if (empty($titulo) || empty($contenido)) {
                $mensaje = "El título y el contenido son obligatorios.";
            } elseif (strlen($titulo) > 100) {
                $mensaje = "El título no puede ser más largo de 100 caracteres.";
            } else {
                // Consulta preparada para evitar inyecciones SQL
                $stmt = $conn->prepare("INSERT INTO bloques (usuario_id, titulo, contenido) VALUES (?, ?, ?)");
                $stmt->bind_param("iss", $id_usuario, $titulo, $contenido);
                if ($stmt->execute()) {
                    $mensaje = "Bloque añadido con éxito.";
                } else {
                    $mensaje = "Error al añadir el bloque.";
                }
                $stmt->close();
            }
        }
        // Eliminar un bloque
        elseif ($_POST['accion'] == 'eliminar' && isset($_POST['bloque_id'])) {
            $bloque_id = intval($_POST['bloque_id']);
            
            // Consulta preparada para eliminar el bloque
            $stmt = $conn->prepare("DELETE FROM bloques WHERE id = ? AND usuario_id = ?");
            $stmt->bind_param("ii", $bloque_id, $id_usuario);
            if ($stmt->execute()) {
                $mensaje = "Bloque eliminado con éxito.";
            } else {
                $mensaje = "Error al eliminar el bloque.";
            }
            $stmt->close();
        }
    }
}

// Obtener los bloques existentes del usuario
$stmt = $conn->prepare("SELECT id, titulo, contenido FROM bloques WHERE usuario_id = ?");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$bloques = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Portfolio</title>
</head>
<body>
    <h1>Editar Portfolio</h1>

    <!-- Mostrar mensaje de error o éxito -->
    <?php if ($mensaje): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="titulo" placeholder="Título del bloque" required>
        <textarea name="contenido" placeholder="Contenido" required></textarea>
        <button type="submit" name="accion" value="añadir">Añadir bloque</button>
    </form>

    <h2>Bloques existentes</h2>
    <?php if (!empty($bloques)): ?>
        <?php foreach ($bloques as $bloque): ?>
            <div>
                <h3><?= htmlspecialchars($bloque['titulo']) ?></h3>
                <p><?= nl2br(htmlspecialchars($bloque['contenido'])) ?></p>

                <!-- Formulario para eliminar el bloque -->
                <form method="POST">
                    <input type="hidden" name="bloque_id" value="<?= $bloque['id'] ?>">
                    <button type="submit" name="accion" value="eliminar">Eliminar</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tienes bloques aún.</p>
    <?php endif; ?>
</body>
</html>
