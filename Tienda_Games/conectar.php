<?php
class Conectar {
    private $conexion;

    public function __construct($servidor, $usuario, $contrasena, $bbdd) {
        // Establecer la conexión a la base de datos
        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);

        // Verificar si hay errores de conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function hacer_consulta($query, $types = null, $params = []) {
        // Preparar la declaración SQL
        $stmt = $this->conexion->prepare($query);

        if ($types && $params) {
            // Vincular parámetros si se proporcionan tipos y parámetros
            $stmt->bind_param($types, ...$params);
        }   

        // Ejecutar la declaración
        if (!$stmt->execute()) {
            // Registrar el error y devolver falso
            error_log("Error SQL: " . $stmt->error);
            return false;
        }

        // Devolver el resultado según el tipo de consulta
        if (strpos($query, "SELECT") === 0) {
            // Para consultas SELECT, devolver el conjunto de resultados
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC); // Devolver todas las filas como un arreglo asociativo
        } else {
            // Para consultas INSERT, UPDATE, DELETE, devolver el número de filas afectadas
            return $stmt->affected_rows > 0;
        }
    }

    public function __destruct() {
        // Cerrar la conexión a la base de datos cuando el objeto es destruido
        $this->conexion->close();
    }
}
?>
