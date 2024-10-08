<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru</title>
    <link rel="icon" href="path/to/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="peru.css">
</head>

<body>
    <div class="grid">
        <!-- Navigation Bar 
        
        <nav>
            <div class="nav-container">
                <ul>
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                </ul>
            </div>
        </nav>
        
        -->

        <!-- Carousel Section -->
        <div class="gallery">
            <div class="gallery-container">
                <img class="gallery-item gallery-item-1" src="./gallery_images/montaña_7colores.jpg" data-index="1">
                <img class="gallery-item gallery-item-2" src="./gallery_images/montaña_7colores.jpg" data-index="2">
            </div>
            <div class="gallery-controls"></div> <!-- Ensure this div exists for controls -->
        </div>

        <!-- Load JavaScript for carousel functionality -->
        <script src="./javascript_files/gallery_main.js"></script>

        <!-- Content Section -->
        <div class="content hidden">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <div class="grid grid-50">
                <div class="image-container">
                    <img class="macchu-picchu" src="./images/macchu_picchu.jpg">
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section -->
    <div class="content hidden">
        <div class="grid">
            <div class="image-container">
                <img class="macchu-picchu" src="./images/macchu_picchu.jpg" alt="Machu Picchu">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
            </div>
            <div class="image-container">
                <img class="macchu-picchu" src="./images/peru_lake.png" alt="Peru Lake">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
            </div>
        </div>
    </div>


    <!-- Script to show content on scroll -->
    <script>
        window.addEventListener('scroll', () => {
            const content = document.querySelector('.content');
            if (window.scrollY > window.innerHeight) {
                content.classList.add('visible');
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
                content.classList.remove('visible');
            }
        });
    </script>

</body>

</html>