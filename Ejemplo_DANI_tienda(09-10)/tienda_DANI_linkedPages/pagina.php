<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto 1</title>
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
<?php
$producto[0]["nombre"] = "Sony's Playstation 5";
$producto[0]["imagen"] = "https://www.trippodo.com/720259-medium_default/sony-playstation-5-825-gb-wifi-negro-blanco.jpg";
$producto[0]["descripcion"] = "<p>Una consola que en cuanto a<span> CÁTALOGO DE JUEGOS </span>no cumplió las expectativas.</p>";
$producto[0]["precio"] = 10;

$imagen = "";
$nombre = "";
$descripcion = "";
$precio = "";
?>

<body>
    <main>
        <div class="grid cincuenta">
            <div>
                <img src="<?= $imagen ?>" alt="<?= $nombre ?>">
                <!--Para poner el símbolo del euro más profesional   '&euro;'
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