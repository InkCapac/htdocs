<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat para página web</title>
    <link rel="stylesheet" href="./index30-10.css">
    <script>
        window.onload = () => {
        const botonAbrir = document.querySelector(".derecha button");
        botonAbrir.onclick = () => {
            const conversacion = document.querySelector(".chat div");
            conversacion.classList.toggle("abierta");
            
        }
    }
    </script>
</head>
<body>
    <div class="chat">
        <div>
            <div class="conversacion">
        <p>¿Hola, qué quieres preguntarme?</p>
    </div>
        <input placeholder="Escribe tu mensaje">
        <button>Enviar</button>
    </div>
        <div class="derecha">
            <button class="abrir-chat">Abrir chat</button>
        </div>
    </div>
</body>

</html>