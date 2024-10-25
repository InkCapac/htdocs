<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="shortcut icon" href="https://e7.pngegg.com/pngimages/662/584/png-clipart-logo-target-corporation-retail-brand-business-target-miscellaneous-company.png" type="image/x-icon">
    <style>
        body {
            background-color: skyblue;
        }

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
        window.onload = () => {
    const anadirProducto = (id) => {
        // Verificamos si ya existe una lista de productos
        let productos = JSON.parse(localStorage.getItem("producto")) || [];

        // Añadimos el nuevo producto
        productos.push({
            id: id,
            nombre: document.querySelector("#prod" + id + " .nombre").innerText,
            cantidad: 1,
            precio: document.querySelector("#prod" + id + " .precio").innerText,
        });

        // Actualizamos el `localStorage`
        localStorage.setItem("producto", JSON.stringify(productos));
    };

    const span = document.querySelector("span");
    const botones = document.querySelectorAll("button");

    botones.forEach(boton => {
        boton.onclick = (event) => {
            const idProducto = event.target.getAttribute("data-numero-producto");
            span.innerText = parseInt(span.innerText) + 1;
            anadirProducto(idProducto);
        }
    });
};

    </script>
</head>

<body>
    <div>
        <img src="https://media.istockphoto.com/id/1206806317/es/vector/icono-del-carrito-de-compras-aislado-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=sdScWRH_AeHdG6vHzMn8xUHCpe7iM6O1Skgi2lPuKG0=" alt="carrito">
        <span>0</span>
    </div>
    <div id="prod1">
        <img src="https://cdn.phonehouse.es/res/products-image/1/0/0/3/5/4/1003549-3037260.jpg?&w=800&h=800&trim=auto&auto=format&q=40">
        <p class="nombre">Play 5</p>
        <span class="precio">500</span>
        <button id="producto1" data-numero-producto="1">Añadir al carrito</button>
    </div>
    <div id="prod2">
        <img src="https://i.ebayimg.com/images/g/UEkAAOSwhDVjPY4M/s-l640.jpg">
        <p class="nombre">Play 2</p>
        <span class="precio">1000</span>
        <button id="producto2" data-numero-producto="2">Añadir al carrito</button>
    </div>
    <div id="prod3">
        <img src="https://resizer.glanacion.com/resizer/v2/sony-lanzo-una-actualizacion-de-software-para-su-SDHDDVIRPJAM7ELMOI4AVHGVQ4.jpg?auth=a4a75de41d03bfcdaa8b9d5723ebaf2c0cbbea8943095d339a767f7145cb0c20&width=768&quality=70&smart=false">
        <p class="nombre">Play 4</p>
        <span class="precio">600</span>
        <button id="producto3" data-numero-producto="3">Añadir al carrito</button>
    </div>
    <div id="prod4">
        <img src="https://i.blogs.es/f62889/playstation-classic-15/650_1200.jpg">
        <p class="nombre">Play 1</p>
        <span class="precio">100</span>
        <button id="producto4" data-numero-producto="4">Añadir al carrito</button>
    </div>
    <!--

        <button id="producto2" data-numero-producto="2">Añadir al carrito</button>
        <button id="producto3" data-numero-producto="3">Añadir al carrito</button>
        <button id="producto4" data-numero-producto="4">Añadir al carrito</button>

        Próximo a entender:
Titulo = "Nombre;Apellido;Fecha;Descripcion"
dato = "Pepe;Concha;1-1-1990;asdasdas"

titulo.split(";") -> ["Nombre", "Apellido", "Fecha", "Descripcion"]
dato.split(";") -> ["Pepe","Concha","1-1-1990","asdasdas"]

producto1 split -> ["","1"]
producto10 split -> ["","10"] 

    -->
</body>

</html>