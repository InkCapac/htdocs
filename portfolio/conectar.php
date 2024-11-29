<?php
class Conectar
{
    private $host;
    private $user;
    private $password;
    private $db;
    private $conn;

    // Constructor para la conexión
    public function __construct($host = 'localhost', $user = 'root', $password = '', $db = 'proyect')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->conn = null;
    }

    // Método para establecer la conexión
    public function obtener_conexion()
    {
        if ($this->conn === null) {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
            if ($this->conn->connect_error) {
                throw new Exception("Conexión fallida: " . $this->conn->connect_error, $this->conn->connect_errno);
            }
            $this->conn->set_charset('utf8mb4');
        }
        return $this->conn;
    }

    // Método para obtener datos
    public function recibir_datos($consulta, $tipos = '', $parametros = [])
    {
        $conn = $this->obtener_conexion();
        $stmt = $conn->prepare($consulta);
        if ($stmt === false) {
            throw new Exception('Error en la preparación de la consulta: ' . $conn->error);
        }
        if (!empty($parametros)) {
            $stmt->bind_param($tipos, ...$parametros);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
        }
        $stmt->close();
        return !empty($datos) ? $datos : null;
    }

    // Método para ejecutar consultas de tipo INSERT, UPDATE o DELETE
    public function ejecutar_accion($consulta, $tipos, $parametros)
    {
        $conn = $this->obtener_conexion();
        $stmt = $conn->prepare($consulta);
        if ($stmt === false) {
            throw new Exception('Error en la preparación de la consulta: ' . $conn->error);
        }
        $stmt->bind_param($tipos, ...$parametros);
        $stmt->execute();
        $stmt->close();
        return true; // Retorna true si se ejecuta correctamente
    }

    // Alias para ejecutar acciones
    public function modificar_datos($consulta, $tipos, $parametros)
    {
        return $this->ejecutar_accion($consulta, $tipos, $parametros);
    }

    // Método para obtener el último ID insertado
    public function ultimo_id()
    {
        $conn = $this->obtener_conexion();
        return $conn->insert_id;
    }

    // Destructor: cerrar la conexión
    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
?>
