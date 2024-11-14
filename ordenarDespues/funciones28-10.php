<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        .producto {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            display: inline-block;
        }
        .producto img {
            max-width: 100px;
            display: block;
        }
        .boton {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <div id="producto1" class="producto">
        <h2>Producto 1</h2>
        <img src="https://m.media-amazon.com/images/I/81ivHwA2ZpL._AC_UF1000,1000_QL80_.jpg" alt="Producto 1">
        <button class="boton">Añadir al Carrito</button>
    </div>
    <div id="producto2" class="producto">
        <h2>Producto 2</h2>
        <img src="https://m.media-amazon.com/images/I/81W+fYqjU0L._AC_UF1000,1000_QL80_.jpg" alt="Producto 2">
        <button class="boton">Añadir al Carrito</button>
    </div>
    <div id="producto3" class="producto">
        <h2>Producto 3</h2>
        <img src="https://cdn1.epicgames.com/spt-assets/700fe8dac3cc49b7bd99b180e3e11daf/zoochosis-m5csw.png" alt="Producto 3">
        <button class="boton">Añadir al Carrito</button>
    </div>

    <script>
        window.onload = () => {
            const producto1 = document.querySelector("#producto1");
            const producto2 = document.querySelector("#producto2");
            const producto3 = document.querySelector("#producto3");
            let carrito;
            if(localStorage.producto !== null){
                //Con JSON convertimos un string o texto en arrays o objetos de JSON
                carrito = JSON.parse(localStorage.producto);
            }else{
                //Los '[]' son para los arrays
                carrito = [];
            }
            if(producto1 !== undefined){
                producto1.addEventListener("click", () => {
                    añadirProducto(1);
                });
                producto2.onclick =  () => {
                    añadirProducto(2);
                };
                producto3.onclick =  () => {
                    añadirProducto(3);
                };
            }
            const añadirProducto = (id) => {
                //.find() para buscar dentro del carrito
                const productoBuscado = carrito.find(producto => producto.id == id);
                if(productoBuscado !== null){
                    productoBuscado.cantidad = productoBuscado.cantidad + 1;
                }else{
                    const productoNuevo = {
                        id: id,
                        nombre: "producto" + id,
                        cantidad: 1
                    };
                    carrito.push(productoNuevo);
                }
                // Guardar el carrito en localStorage
                localStorage.producto = JSON.stringify(carrito); 
            };
        };
    </script>
</body>
</html>

/*
carrito = [
    {
        nombre: "producto1",
        cantidad: 3
    },
    {
        nombre: "producto2",
        cantidad: 7
    }
]
*/