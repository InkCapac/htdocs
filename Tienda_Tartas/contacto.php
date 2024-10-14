<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarif Kamiso | Contacto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_contacto.css">
    <link rel="stylesheet" href="./tienda_tartas_css/tienda_nav_general.css">

</head>

<body>
    <header>
        <nav class="grid cinco">
            <a class="logo" href=""></a>
            <a href="./tartas.php">Inicio</a>
            <a href="./productos.php">Productos</a>
            <a href="./preguntas.php">Preguntas frecuentes</a>
            <a href="./contacto.php">Contacto</a>
        </nav>
    </header>
    <main>
        <div class="form-box">
            <form>
                <p>Forma parte de</p>
                <div class="grid inputs">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                <p>Información adicional</p>
                <textarea id="additional-info" name="additional_info" cols="30" rows="20"></textarea>
                <div class="grid checkbox-message">
                    <input type="checkbox" id="consent" name="consent" class="arriba">
                    <label for="consent">Por favor, haz click en este botón para asegurarnos que estás de acuerdo con
                        nuestras condiciones de servicio.</label>
                </div>
                <button type="submit">Enviar datos</button>
            </form>
        </div>
    </main>
    <footer>
        <p>© Zarif Kamiso 2024 All rights reserved</p>
    </footer>
</body>

</html>