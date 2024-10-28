<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Productos</h1>
    <div id="producto1">Producto 1</div>
    <div id="producto2">Producto 2</div>
    <div id="producto3">Producto 3</div>

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
            producto1.addEventListener("click", () => {
                añadirProducto(1);
            });
            producto2.onclick =  () => {
                añadirProducto(2);
            };
            producto3.onclick =  () => {
                añadirProducto(3);
            };
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
                localStorage.producto = JSON.stringify(carrito); // Guardar el carrito en localStorage
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