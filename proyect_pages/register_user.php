<?php
include '../proyect_database/conectar.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo electrónico ya existe
    $checkEmailStmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        $message = "El correo electrónico ya existe";
        $toastClass = "bg-primary"; // Clase para color primario
    } else {
        // Preparar e insertar
        $stmt = $conn->prepare("INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $message = "Cuenta creada exitosamente";
            $toastClass = "bg-success"; // Clase para color de éxito
        } else {
            $message = "Error: " . $stmt->error;
            $toastClass = "bg-danger"; // Clase para color de error
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css_pages/regsiter_box.css"> <!-- Enlace al archivo CSS externo -->
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Registro</title>
</head>

<body class="bg-light">
    <div class="container p-5 d-flex flex-column align-items-center">
        <?php if ($message): ?>
            <div class="toast align-items-center text-white border-0 <?php echo $toastClass; ?>" 
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo $message; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" 
                        data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        
        <form method="post" class="form-control mt-5 p-4">
            <div class="row text-center">
                <i class="fa fa-user-circle-o fa-3x mt-1 mb-2"></i>
                <h5 class="p-4">Crea tu cuenta</h5>
            </div>
            <div class="mb-2">
                <label for="username"><i class="fa fa-user"></i> Nombre de usuario</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-2 mt-2">
                <label for="email"><i class="fa fa-envelope"></i> Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-2 mt-2">
                <label for="password"><i class="fa fa-lock"></i> Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-2 mt-3">
                <button type="submit" class="btn btn-success">Crear cuenta</button>
            </div>
            <div class="mb-2 mt-4">
                <p class="text-center">¿Ya tienes una cuenta? <a href="./login.php">Inicia sesión</a></p>
            </div>
        </form>
    </div>
    
    <script>
        let toastElList = [].slice.call(document.querySelectorAll('.toast'));
        let toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, { delay: 3000 });
        });
        toastList.forEach(toast => toast.show());
    </script>
</body>

</html>
