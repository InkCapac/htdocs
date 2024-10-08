<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Peru</title>
    <!--Archivo css de la galería principal-->
    <link rel="stylesheet" href="./css_files/gallery.css"> 
    <!--Archivo css del main del sitio web-->
    <link rel="stylesheet" href="./css_files/main.css">
    <!--Archivo css del formulario-->
    <link rel="stylesheet" href="./css_files/info_form.css">
</head>

<body>
    <!--Apartado del mensaje de notificación-->
    <script src="./js_files/box_message.js"></script>
    <link rel="stylesheet" href="./css_files/message_box.css">
    <div class="modal ocultar">
        <div class="fondo"></div>
        <div class="contenido">
            <p>This is a message box!</p>
            <button class="x">X</button>
            <button class="cerrar">Close</button>
        </div>
    </div>
    <!--Galería de imágenes-->
    <div class="gallery">
        <div class="gallery-container">
            <img class="gallery-item active" src="./gallery_images/montana_7colores.jpg" data-index="1">
            <img class="gallery-item" src="./gallery_images/peru_llamas.jpg" data-index="2">
            <img class="gallery-item" src="./gallery_images/montana_7colores.jpg" data-index="3">
            <img class="gallery-item" src="./gallery_images/peru_llamas.jpg" data-index="4">
            <img class="gallery-item" src="./gallery_images/montana_7colores.jpg" data-index="5">
        </div>
    </div>

    <!--Botones de navegación debajo de la galería-->
    <div class="nav-buttons">
        <button class="nav-button" id="prevButton">Previous</button>
        <button class="nav-button" id="nextButton">Next</button>
    </div>

    <!--Texto Persuasivo-->
    <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quia distinctio quibusdam autem enim placeat
            ratione nihil maiores sapiente. Sit blanditiis laborum ex quia? Quibusdam accusamus sapiente exercitationem
            sequi incidunt?</p>
    </div>
    <!--Sección de contenidos-->
    <div class="content">
        <div class="grid">
            <div class="image-container">
                <img class="macchu-picchu" src="./content_images/macchu_picchu.jpg" alt="Machu Picchu">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
            </div>
            <div class="image-container">
                <img class="macchu-picchu" src="./content_images/peru_lake.jpg" alt="Peru Lake">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto optio repudiandae.</p>
            </div>
        </div>
    </div>

    <!--Sección del formulario de la esquina-->
    <!--Formulario-->
    <div class="form-box">
        <form>
            <p>Rellena con tus datos este formulario y te contactaremos pronto:</p>
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
            <div class="grid check">
                <input type="checkbox" id="consent" name="consent" class="arriba">
                <label for="consent">Please tick this box to consent that Spencer Lion LTD will be in touch with you
                    regarding your enquiry.</label>
            </div>
            <button type="submit">Send message</button>
        </form>
        <button class="callback">Quick callback</button>
    </div>


    <!--Archivos de JavaScript-->
    <!--JS del archivo de la galería principal-->
    <script src="./js_files/gallery.js"></script>
    <!--JS del formularío de la esquina--> 
    <script src="./js_files/info_form.js"></script>
    <!--JS del main del sitio web-->
    <script src="./js_files/main.js"></script>

    </div>
    <footer></footer>
</body>

</html>