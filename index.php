<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 200px;
        }

        div {
            position: relative;
            width: fit-content;
        }

        span {
            position: absolute;
            top: 37px;
            right: 7px;
            background: #f58d8d;
            padding: 10px 15px;
            display: block;
            border-radius: 50%;
            border: 1px solid black;
        }
    </style>
    <script>
        window.onload = () => { //\\PC18567\htdocs

            const anadirProducto = id => {
                if (localStorage.producto) {
                    const datos = JSON.parse(localStorage.getItem("producto"));
                    datos.push("Se ha añadido el producto " + id);
                    localStorage.producto = JSON.stringify(datos);
                } else {
                    localStorage.producto = JSON.stringify(["Se ha añadido el producto " + id]);
                }
            }
            localStorage.producto = JSON.stringify(["Se ha añadido el producto " + id]);
        }
        const span = document.querySelector("span");
        const botones = document.querySelectorAll("button");
        botones.forEach(boton => {
            boton.onclick = (event) => {
                //const idProducto = event.target.getAttribute("id").substr(8);
                //const idProducto = event.target.getAttribute("id").split("producto")[1];
                const idProducto = event.target.getAttribute("data-numero-producto");
                span.innerText = parseInt(span.innerText) + 1;
                anadirProducto(idProducto);
            }
        })
    </script>
</head>

<body>
    <div>
        <img src="https://media.istockphoto.com/id/1206806317/es/vector/icono-del-carrito-de-compras-aislado-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=sdScWRH_AeHdG6vHzMn8xUHCpe7iM6O1Skgi2lPuKG0=" alt="">
        <span>0</span>
    </div>
    <button id="producto1" data-numero-producto="1">Añadir al carrito</button>
    <button id="producto2" data-numero-producto="2">Añadir al carrito</button>
    <button id="producto3" data-numero-producto="3">Añadir al carrito</button>
    <button id="producto4" data-numero-producto="4">Añadir al carrito</button>
</body>

</html>