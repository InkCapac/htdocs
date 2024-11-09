window.onload = () => {
    // Inicializa el carrito desde localStorage o establece un array vacío si no está presente
    let carrito = localStorage.producto ? JSON.parse(localStorage.producto) : [];

    // Selecciona todos los botones "Adquirir" y agrega el evento de clic
    document.querySelectorAll(".adquirir-btn").forEach((boton) => {
        boton.addEventListener("click", () => {
            // Obtén el id del producto del atributo data-id
            const id = boton.getAttribute("data-id"); 
            añadirProducto(id);
        });
    });

    // Función para añadir productos al carrito
    const añadirProducto = (id) => {
        // Verifica si el producto ya existe en el carrito
        const productoBuscado = carrito.find(producto => producto.id == id);
        if (productoBuscado) {
            productoBuscado.cantidad += 1;  // Incrementa la cantidad si ya está en el carrito
        } else {
            const productoNuevo = {
                id: id,
                nombre: "producto" + id, // Considera cambiar esto al nombre real del producto si es posible
                cantidad: 1
            };
            carrito.push(productoNuevo);  // Agrega el nuevo producto al carrito
        }
        // Guarda el carrito actualizado en localStorage
        localStorage.producto = JSON.stringify(carrito); 
        alert("Producto añadido al carrito");  // Opcional: confirma la adición del producto
    };

    // Función para vaciar el carrito
    const vaciarCarrito = () => {
        localStorage.removeItem("producto");  // Elimina el carrito de localStorage
        carrito = [];  // Limpia el array local
        alert("El carrito ha sido vaciado.");  // Notifica al usuario
    };

    // Agrega el evento de clic al botón de "Vaciar Carrito"
    const botonVaciar = document.getElementById("vaciarCarrito");
    if (botonVaciar) {
        botonVaciar.addEventListener("click", vaciarCarrito);
    }
};
