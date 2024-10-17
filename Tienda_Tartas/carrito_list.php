<?php
class Conectar {
    private $conexion;

    function __construct($servidor, $usuario, $contrasena, $bbdd) {
        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);
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

        $array_completo = array_merge([$tipos], $variables);
        $referencias = [];
        foreach ($array_completo as $clave => $valor) {
            $referencias[$clave] = &$array_completo[$clave];
        }

        call_user_func_array([$sentencia, 'bind_param'], $referencias);
        if ($sentencia->execute() === false) {
            die("Error executing statement: " . $sentencia->error);
        }

        echo "Se han actualizado los datos correctamente";
    }

    function recibir_datos($consulta, $tipos = null, $variables = null) {
        if ($tipos && $variables) {
            $sentencia = $this->conexion->prepare($consulta);
            if ($sentencia === false) {
                die("Error preparing statement: " . $this->conexion->error);
            }

            $referencias = [];
            foreach ($variables as $key => $value) {
                $referencias[$key] = &$variables[$key];
            }

            call_user_func_array([$sentencia, 'bind_param'], array_merge([$tipos], $referencias));
            $sentencia->execute();
            $result = $sentencia->get_result();
            $filas = $result->fetch_all(MYSQLI_ASSOC);
            $sentencia->close();
            return $filas;
        } else {
            $result = $this->conexion->query($consulta);
            if ($result === false) {
                die("Error retrieving data: " . $this->conexion->error);
            }
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    function cerrar_conexion() {
        $this->conexion->close();
    }

    function __destruct() {
        $this->cerrar_conexion();
    }
}
