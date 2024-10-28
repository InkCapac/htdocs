window.onload = () => {
    //Con JSON convertimos un string o texto en arrays o objetos de JSON
    let carrito = localStorage.producto ? JSON.parse(localStorage.producto) : [];

    // Selecciona todos los botones "Adquirir" y agrega el evento de clic
    document.querySelectorAll(".adquirir-btn").forEach((boton) => {
        boton.addEventListener("click", () => {
            // Obtén el id del producto del atributo data-id
            const id = boton.getAttribute("data-id"); 
            añadirProducto(id);
        });
    });

    // Función para añadir productos
    const añadirProducto = (id) => {
        //.find() para buscar dentro del carrito
        const productoBuscado = carrito.find(producto => producto.id == id);
        if (productoBuscado) {
            productoBuscado.cantidad += 1;
        } else {
            const productoNuevo = {
                id: id,
                nombre: "producto" + id,
                cantidad: 1
            };
            carrito.push(productoNuevo);
        }
        // Guarda el carrito en localStorage
        localStorage.producto = JSON.stringify(carrito); 
    };

    // Función para vaciar el carrito
    const vaciarCarrito = () => {
        // Elimina el carrito de localStorage
        localStorage.removeItem("producto"); 
        // Limpia el array local también
        carrito = []; 
        alert("El carrito ha sido vaciado.");
    };

    // Agrega el evento de clic al botón de "Vaciar Carrito"
    const botonVaciar = document.getElementById("vaciarCarrito");
    if (botonVaciar) {
        botonVaciar.addEventListener("click", vaciarCarrito);
    }
};
