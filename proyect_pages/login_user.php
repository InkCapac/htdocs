<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Si ya está logueado, redirige al dashboard
    header("Location: dashboard.php");
    exit;
}

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conexión y consulta a la base de datos
    include '../database/conectar.php';
    $stmt = $conn->prepare("SELECT id, password FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            // Almacena el ID del usuario en la sesión
            $_SESSION['user_id'] = $user_id;
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Contraseña incorrecta";
            $toastClass = "bg-danger";
        }
    } else {
        $message = "Email no encontrado";
        $toastClass = "bg-warning";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Page</title>
</head>
<body class="bg-light">
    <div class="container p-5 d-flex flex-column align-items-center">
        <?php if ($message): ?>
            <div class="toast align-items-center text-white <?php echo $toastClass; ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"><?php echo $message; ?></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
        <form action="" method="post" class="form-control mt-5 p-4">
            <div class="row">
                <h5 class="text-center p-4">Login Into Your Account</h5>
            </div>
            <div class="col-mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="col mb-3 mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="col mb-3 mt-3">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
