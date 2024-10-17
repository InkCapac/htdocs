<?php
class Conectar {
    private $connection;

    public function __construct($servidor, $usuario, $contrasena, $bbdd) {
        // Establish your database connection here
        $this->connection = new mysqli($servidor, $usuario, $contrasena, $bbdd);

        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to execute a query
    public function hacer_consulta($query, $types = '', $params = []) {
        // Prepare the statement
        $stmt = $this->connection->prepare($query);

        // Check if prepare failed
        if ($stmt === false) {
            die("Prepare failed: " . $this->connection->error);
        }

        // Bind parameters if provided
        if (!empty($types)) {
            $stmt->bind_param($types, ...$params);
        }

        // Execute the query
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        // Check if it's a SELECT statement
        if (stripos($query, 'SELECT') === 0) {
            // Fetch results as an associative array
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data; // Return the fetched data
        }

        // For INSERT, UPDATE, DELETE, just return true
        $stmt->close();
        return true;
    }

    // Method to receive data based on a SQL query
    public function recibir_datos($query) {
        return $this->hacer_consulta($query); // Call hacer_consulta to fetch data
    }

    // Method to insert a product into the carrito table
    public function agregar_a_carrito($id_producto, $nombre, $cantidad, $precio) {
        $query = "INSERT INTO carrito (id_producto, nombre, cantidad, precio) VALUES (?, ?, ?, ?)";
        return $this->hacer_consulta($query, 'isid', [$id_producto, $nombre, $cantidad, $precio]);
    }

    // Method to get all items in the carrito
    public function obtener_carrito() {
        $query = "SELECT * FROM carrito";
        return $this->hacer_consulta($query);
    }

    public function __destruct() {
        $this->connection->close(); // Close the connection when the object is destroyed
    }
}
?>
