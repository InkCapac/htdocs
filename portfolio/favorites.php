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
/*
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
*/
// Obtener los datos de los portfolios
$query = "SELECT * FROM portfolios";
$result = $conn->query($query);
?>
