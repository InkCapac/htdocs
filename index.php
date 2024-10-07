<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Guay</title>
    <!-- Archivos css -->
    <link rel="stylesheet" href="./store_css/store_gallery.css">
    <link rel="stylesheet" href="./store_css/store_catalogue.css">
    <link rel="stylesheet" href="./store_css/store_main.css">
</head>

<body>
    <!-- Galería de imágenes -->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="./store_gallery/black_friday_deals.jpg" data-index="1">
            <img class="gallery-item" src="./store_gallery/xbox_controller.jpg" data-index="2">
            <img class="gallery-item" src="./store_gallery/store_shelves.jpg" data-index="3">
            <img class="gallery-item" src="./store_gallery/stream4k_android-pod_new.jpg" data-index="4">
            <img class="gallery-item" src="./store_gallery/videogames_catalogue.jpg" data-index="5">
        </div>
    </div>
    <!-- Botones -->
    <div class="nav-buttons">
        <button style="font-family: arcade;" class="nav-button" id="prevButton">Anterior</button>
        <button style="font-family: arcade" class="nav-button" id="nextButton">Adelante</button>
    </div>
    <h1 class="parrafo-1" style="font-family: arcade; color: orange;">
        <p>Pick the videogame you most like!</p>
    </h1>

    <!-- Catálogo productos -->
    <main class="fondo">
        <section class="grid una tablet-dos ordenador-tres grid-33 margen">
            <article>
                    <img style="cursor: pointer;" src="./store_images/wukong.avif" alt="Wukong">
                    <button style="font-family: arcade;">Comprar</button>
            </article>
            <article>
                <img style="cursor: pointer;" src="./store_images/gow.avif" alt="God of War">
                <button style="font-family: arcade;">Comprar</button>
            </article>
            <article>
                <img style="cursor: pointer;" src="./store_images/warhammer.avif" alt="Warhammer">
                <button style="font-family: arcade;">Comprar</button>
            </article>
            <article>
                    <img style="cursor: pointer;" src="./store_images/wukong.avif" alt="Wukong">
                    <button style="font-family: arcade;">Comprar</button>
            </article>
            <article>
                <img style="cursor: pointer;" src="./store_images/gow.avif" alt="God of War">
                <button style="font-family: arcade;">Comprar</button>
            </article>
            <article>
                <img style="cursor: pointer;" src="./store_images/warhammer.avif" alt="Warhammer">
                <button style="font-family: arcade;">Comprar</button>
            </article>
        </section>
    </main>

    <!-- Archivos JavaScript -->
    <script src="./store_js/store_gallery.js"></script>
    <footer></footer>
    <div class="hamburguesa">
        
    </div>
</body>

</html>