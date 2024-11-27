<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        button {
            padding: 10px 20px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="#" method="POST">
        <!-- Sección de Presentación personal -->
        <div class="form-section">
            <h2>Presentación Personal</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="biografia">Biografía:</label>
            <textarea id="biografia" name="biografia" rows="4" required></textarea>

            <label for="habilidades">Habilidades:</label>
            <input type="text" id="habilidades" name="habilidades" placeholder="Ej: HTML, CSS, JavaScript, etc." required>

            <label for="experiencia">Experiencia Laboral:</label>
            <textarea id="experiencia" name="experiencia" rows="4"></textarea>

            <label for="estudios">Estudios Relevantes:</label>
            <input type="text" id="estudios" name="estudios">
        </div>

        <!-- Sección de Galería de trabajos -->
        <div class="form-section">
            <h2>Galería de Trabajos</h2>
            <label for="trabajo1">Trabajo 1 (Descripción y enlace):</label>
            <textarea id="trabajo1" name="trabajo1" rows="4" placeholder="Descripción, enlaces o imágenes"></textarea>

            <label for="trabajo2">Trabajo 2 (Descripción y enlace):</label>
            <textarea id="trabajo2" name="trabajo2" rows="4"></textarea>

            <label for="trabajo3">Trabajo 3 (Descripción y enlace):</label>
            <textarea id="trabajo3" name="trabajo3" rows="4"></textarea>

            <label for="categoria">Categoría de Trabajos:</label>
            <select id="categoria" name="categoria">
                <option value="diseno">Diseño Gráfico</option>
                <option value="desarrollo">Desarrollo Web</option>
                <option value="fotografia">Fotografía</option>
            </select>
        </div>

        <!-- Sección de Testimonios -->
        <div class="form-section">
            <h2>Testimonios (Opcional)</h2>
            <label for="testimonio">Testimonio:</label>
            <textarea id="testimonio" name="testimonio" rows="4" placeholder="Escribe un testimonio aquí..."></textarea>
        </div>

        <!-- Sección de Contacto -->
        <div class="form-section">
            <h2>Sección de Contacto</h2>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono">

            <label for="enlaces">Redes Sociales (Enlaces):</label>
            <input type="text" id="enlaces" name="enlaces" placeholder="Ej: LinkedIn, GitHub">
        </div>

        <!-- Sección de Blog (Opcional) -->
        <div class="form-section">
            <h2>Blog o Noticias (Opcional)</h2>
            <label for="blog">Artículos o Noticias:</label>
            <textarea id="blog" name="blog" rows="4" placeholder="Escribe un artículo o nota aquí..."></textarea>
        </div>

        <!-- Botón de Enviar -->
        <button type="submit">Enviar Portfolio</button>
    </form>
</div>

</body>
</html>
