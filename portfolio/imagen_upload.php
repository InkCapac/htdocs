<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen_perfil'])) {
    // Verificar si la imagen se subió correctamente
    if ($_FILES['imagen_perfil']['error'] === UPLOAD_ERR_OK) {
        // Ruta de la carpeta donde se guardarán las imágenes
        $carpeta_destino = "./imagenes_perfil/";

        // Verificar si la carpeta existe, si no, crearla
        if (!is_dir($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        // Nombre temporal del archivo subido
        $nombre_archivo = time() . "_" . $_FILES['imagen_perfil']['name'];
        $tmp_archivo = $_FILES['imagen_perfil']['tmp_name'];

        // Verificar extensión del archivo
        $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extension_archivo = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

        if (!in_array(strtolower($extension_archivo), $extensiones_permitidas)) {
            echo "Formato de archivo no permitido.";
            exit();
        }

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($tmp_archivo, $carpeta_destino . $nombre_archivo)) {
            // Conectar a la base de datos
            $conexion = new Conectar('localhost', 'root', '', 'proyect');
            $conn = $conexion->obtener_conexion();

            // ID del usuario, asumiendo que tienes el ID del usuario o algún valor relacionado
            $id_usuario = 1;  // Este valor debes obtenerlo, por ejemplo, desde la sesión

            // Actualizar el registro en la base de datos con el nombre de la imagen
            $stmt = $conn->prepare("UPDATE portfolios SET imagen_perfil = ? WHERE id_usuario = ?");
            $stmt->bind_param("si", $nombre_archivo, $id_usuario);

            if ($stmt->execute()) {
                echo "Imagen subida y guardada exitosamente.";
            } else {
                echo "Error al guardar la imagen en la base de datos.";
            }

            $stmt->close();
        } else {
            echo "Error al mover la imagen a la carpeta de destino.";
        }
    } else {
        echo "Hubo un error al subir la imagen.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}
?>
