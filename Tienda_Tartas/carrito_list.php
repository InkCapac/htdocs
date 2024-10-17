<?php
class Conectar {
    private $conexion;

    function __construct($servidor, $usuario, $contrasena, $bbdd) {
        // Create a connection to the database
        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);

        // Check for connection errors
        if ($this->conexion->connect_error) {
            die("Connection failed: " . $this->conexion->connect_error);
        }
    }

    public function get_connection() {
        return $this->conexion;
    }

    function hacer_consulta($consulta, $tipos, $variables) {
        $sentencia = $this->conexion->prepare($consulta);
        if ($sentencia === false) {
            die("Error preparing statement: " . $this->conexion->error);
        }

        // Bind parameters securely
        $array_completo = array_merge([$tipos], $variables);
        $referencias = [];
        
        foreach ($array_completo as $clave => $valor) {
            $referencias[$clave] = &$array_completo[$clave];
        }

        call_user_func_array([$sentencia, 'bind_param'], $referencias);
        
        // Execute the query
        if ($sentencia->execute() === false) {
            die("Error executing statement: " . $sentencia->error);
        }
        
        echo "Se han actualizado los datos correctamente"; // Optional feedback
        // Connection remains open for further use
    }

    function recibir_datos($consulta) {
        $sentencia = $this->conexion->query($consulta);
        if ($sentencia === false) {
            die("Error retrieving data: " . $this->conexion->error);
        }
        
        $filas = [];
        while ($row = $sentencia->fetch_assoc()) {
            $filas[] = $row;
        }
        // Connection remains open for further use
        return $filas;
    }

    // Optional: Add a method to close the connection
    function cerrar_conexion() {
        $this->conexion->close();
    }

    // Destructor to close the connection when the object is destroyed
    function __destruct() {
        $this->cerrar_conexion(); // Ensure connection is closed
    }
}
?>
