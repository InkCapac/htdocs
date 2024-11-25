<?php
include 'conectar.php';

try {
    // Crear instancia de la clase Conectar con las credenciales de root
    $conexion = new Conectar('localhost', 'root', '', 'proyect'); // Deja la contraseña vacía para 'root'
    $conn = $conexion->obtener_conexion();

    // Verificar si se pasó un id por GET
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Consultar el portfolio del usuario
        $stmt = $conn->prepare("SELECT * FROM portfolios WHERE id_usuario = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $portfolio = $result->fetch_assoc();
            // Mostrar el portfolio
            echo "<h1>" . $portfolio['nombre'] . "</h1>";
            echo "<p>" . $portfolio['biografia'] . "</p>";
            // Resto de la información...
        } else {
            echo "No se encontró el portfolio.";
        }
    } else {
        echo "No se ha especificado un ID de usuario.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

