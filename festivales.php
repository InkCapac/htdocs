<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visit Peru - Festivales</title>
        <link rel="shortcut icon" href="./content_images/peru_logo.jpg" type="image/x-icon">
        <!--Fonts para la página (Montserrat Alternates) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <!--Archivos .css -->
        <link rel="stylesheet" href="./css_linkedPages/general_navbar.css">
        <link rel="stylesheet" href="./css_linkedPages/general_gallery.css">
        <link rel="stylesheet" href="./css_linkedPages/festivales.css">
        <link rel="stylesheet" href="./css_linkedPages/general_infoForm.css">
        <!--Link del 'font' que contiene los simbolos de redes sociales-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!--Página de carga-->
        <div id="loader"></div>
        <!--Barra de navegación de la página web-->
        <div class="navbar">
            <a href="#"><img src="https://www.pikpng.com/pngl/b/542-5426711_logo-marca-peru-logo-peru-clipart.png"
                    alt="Marca Perú" class="navbar-imagen"></a>
            <a href="Main page">Visit Peru </a>
            <a href="./destinos.php">Destinos</a>
            <a href="./gastronomia.php">Gastronomía</a>
            <a href="#inicio-festivales">Festivales</a>
        </div>


        <!--Galería de imágenes-->
        <div class="gallery">
            <div class="gallery-container">
                <img class="gallery-item active" src="https://www.radionacional.gob.pe/sites/default/files/cantooo.jpg"
                    data-index="1">
                <img class="gallery-item"
                    src="https://www.mundomapi.com/images/tours/inti-raymi-full-day-cusco-1650639217.jpg"
                    data-index="2">
                <img class="gallery-item"
                    src="https://www.ytuqueplanes.com/imagenes/fotos/novedades/d-Motivo-danza-de-tijeras.jpg"
                    data-index="3">
            </div>
        </div>

        <!--Botones de navegación debajo de la galería-->
        <div class="nav-buttons">
            <button class="nav-button" id="prevButton">Anterior</button>
            <button class="nav-button" id="nextButton">Siguiente</button>
        </div>
        <!--Párrafo debajo de la galería-->
        <div id="inicio-festivales" class="festivales-paragraph">
            <p>
                Los bailes y carnavales de Perú son una vibrante celebración de la diversa herencia cultural del país,
                en la que
                se
                mezclan tradiciones indígenas, españolas, africanas y mestizas. Estos acontecimientos se caracterizan
                por sus
                coloridos trajes, sus intrincadas coreografías y su profundo significado espiritual. Desde la enérgica
                Danza de
                Tijeras hasta el gran espectáculo del Inti Raymi o la animada Fiesta de la Candelaria, cada danza y
                carnaval
                refleja
                la rica historia e identidad del pueblo peruano, conectándolo con sus antepasados, la naturaleza y la
                comunidad.
                Estas celebraciones no sólo muestran la expresión artística, sino que también preservan rituales
                ancestrales, lo
                que
                las convierte en una parte esencial del legado cultural de Perú.
            </p>
        </div>
        <!--Contenido debajo de la galería-->
        <div class="image-paragraph-container">
            <img src="https://danzasdelaselva.com/wp-content/uploads/2021/02/historia-danza-de-las-tijeras.jpg"
                alt="Danza de las Tijeras">
            <p>
                La Danza de Tijeras es una vibrante expresión de las tradiciones prehispánicas, que combina la
                espiritualidad
                andina con representaciones rituales relacionadas con la agricultura y la religión. Los bailarines,
                ataviados
                con elaborados trajes de vivos colores adornados con lentejuelas, hacen chocar rítmicamente unas tijeras
                de
                metal, símbolo de su conexión con la naturaleza y los antiguos dioses. Acompañados por instrumentos
                andinos
                tradicionales, como el arpa y el violín, los bailarines realizan acrobacias, como saltos, volteretas y
                equilibrios, en una exhibición competitiva de resistencia y fuerza espiritual. Esta danza, antaño
                vinculada a
                ceremonias indígenas, sigue siendo un símbolo venerado del patrimonio cultural de Perú, por lo que la
                UNESCO la
                ha reconocido como Patrimonio Cultural Inmaterial.
            </p>
        </div>

        <!--Contenido del formulario en la esquina-->
        <!-- Capa que cubre el contenido principal cuando se activa el formulario -->
        <!-- Capa -->
        <div id="capa" class="capa" style="display:none;"></div>

        <!-- Botón de contacto -->
        <button style="font-family: Montserrat Alternates; font-size:x-large" class="contact">CONTÁCTANOS</button>

        <!-- Caja de formulario -->
        <div class="form-box">
            <h2>Socios de
                PROMPERÚ</h2>

            <!-- Navegación para Login y Registro -->
            <div class="form-toggle">
                <button style="font-family: Montserrat Alternates" id="login-toggle" class="active">Login</button> |
                <button style="font-family: Montserrat Alternates" id="register-toggle">Registrarse</button>
            </div>

            <!-- Formulario de inicio de sesión -->
            <form id="login-form" class="grid">
                <label for="email-login">Correo Electrónico</label>
                <input type="email" id="email-login" name="email-login" required>

                <label for="password-login">Contraseña</label>
                <input type="password" id="password-login" name="password-login" required>

                <div class="grid checkbox-message">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordar contraseña</label>
                </div>

                <p style="text-align: left; font-size:medium" class="forgot-password"><a href="#">Olvidaste tu
                        contraseña?</a></p>

                <button style="font-family: Montserrat Alternates;" type="submit">INGRESAR</button>
            </form>

            <!-- Formulario de registro (Inicialmente oculto) -->
            <form id="register-form" class="grid inputs" style="display:none;">
                <p style="text-align:left; font-size:large; font-weight:bold">Hazte miembro de <a
                        href="https://www.gob.pe/promperu">PROMPERÚ</a></p>

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Confirmar contraseña</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <div class="grid checkbox-message">
                    <input type="checkbox" id="consent" name="consent" required>
                    <label for="consent"><a href="#"> Aceptar términos y condiciones.</a></label>
                </div>
                <br>
                <button style="font-family: Montserrat Alternates;" type="submit">REGISTRARME</button>
            </form>
        </div>


        <!--Archivos JavaScript de la página-->
        <script src="./js_linkedPages/general_navbar.js"></script>
        <script src="./js_linkedPages/general_gallery.js"></script>
        <script src="./js_linkedPages/general_loadingPage.js"></script>
        <script src="./js_linkedPages/general_infoForm.js"></script>

        <footer>
            <!--Símbolos de redes sociales-->
            <div class="footerContainer">
                <div class="socialIcons">
                    <a href="https://www.facebook.com/marcaPERU.lat"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/peru/"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/marcaPERU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i
                            class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.youtube.com/@marcaperu"><i class="fa-brands fa-youtube"></i></a>
                </div>
                <p class="footer-p">© 2024 Visit Peru All rights reserved.</p>

        </footer>
    </body>

    </html>