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
        // Asignamos los valores pasados al constructor
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->conn = null; // Inicializamos la conexión en null
    }

    // Método para establecer la conexión
    public function obtener_conexion()
    {
        // Si la conexión no está establecida, la creamos
        if ($this->conn === null) {
            // Usamos 'root' como usuario y dejamos la contraseña vacía (por defecto en XAMPP)
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

            // Verificar si hubo error en la conexión
            if ($this->conn->connect_error) {
                throw new Exception("Conexión fallida: " . $this->conn->connect_error, $this->conn->connect_errno);
            }

            // Establecer el conjunto de caracteres
            $this->conn->set_charset('utf8mb4'); // Configuramos el charset aquí
        }
        return $this->conn;
    }

    // Método para ejecutar consultas y devolver los resultados
    public function recibir_datos($consulta, $tipos = '', $parametros = [])
    {
        $conn = $this->obtener_conexion();
        // Preparar la consulta
        $stmt = $conn->prepare($consulta);
        if ($stmt === false) {
            throw new Exception('Error en la preparación de la consulta: ' . $conn->error);
        }
        // Vincular los parámetros si existen
        if (!empty($parametros)) {
            $stmt->bind_param($tipos, ...$parametros);
        }
        $stmt->execute();

        // Obtener los resultados
        $result = $stmt->get_result();

        // Procesar los resultados, si existen
        $datos = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
        }

        // Cerrar el statement después de obtener los resultados
        $stmt->close();

        // Retornar los datos, si existen; de lo contrario, null
        return !empty($datos) ? $datos : null;
    }

    // Método para ejecutar consultas de tipo INSERT, UPDATE o DELETE (que no devuelven datos)
    public function ejecutar_accion($consulta, $tipos, $parametros)
    {
        $conn = $this->obtener_conexion();
        $stmt = $conn->prepare($consulta);

        if ($stmt === false) {
            throw new Exception('Error en la preparación de la consulta: ' . $conn->error);
        }

        // Vinculamos los parámetros y ejecutamos la consulta
        $stmt->bind_param($tipos, ...$parametros);
        $stmt->execute();
        $stmt->close();
    }

    // Destructor: automáticamente cierra la conexión al destruir el objeto
    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
            $this->conn = null; // Aseguramos que la conexión se cierre solo una vez
        }
    }
}
?>
