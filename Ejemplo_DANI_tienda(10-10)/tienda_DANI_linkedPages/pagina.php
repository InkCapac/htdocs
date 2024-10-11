<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bbdd = "diseno";
$id = $_GET["id"];
$conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
//HAREMOS LA CONSULTA:
$conexion->recibir_datos("SELECT * FROM productos WHERE id = '$id'");

$imagen = $producto[0]["imagen"];
$nombre = $producto[0]["nombre"];
$descripcion = $producto[0]["descripcion"];
$precio = $producto[0]["precio"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de compra</title>
    <style>
        .grid {
            display: grid;
        }

        .cincuenta {
            grid-template-columns: 30% 70%;
        }

        img {
            width: 100%;
        }

        main {
            width: 75%;
            margin: auto;
        }

        span {
            color: red;
        }
    </style>
</head>

<!-- líneas de código para meter un producto a mano desde este file:
$producto[0]["nombre"] = "Sony's Playstation 5";
$producto[0]["imagen"] = "https://www.trippodo.com/720259-medium_default/sony-playstation-5-825-gb-wifi-negro-blanco.jpg";
$producto[0]["descripcion"] = "<p>Una consola que en cuanto a<span> CÁTALOGO DE JUEGOS </span>no cumplió las expectativas.</p>";
$producto[0]["precio"] = 525;
-->

<body>
    <main>
        <div class="grid cincuenta">
            <div>
                <img src="<?= $imagen ?>" alt="<?= $nombre ?>">
                <!--Para poner el símbolo del euro más profesional'&euro;'
                <p>10&euro;</p>
            -->
            </div>
            <div>
                <h2><?= $nombre ?></h2>
                <p><?= $descripcion ?></p>
                <p><?= $precio ?></p>
            </div>
        </div>
    </main>
</body>

</html>