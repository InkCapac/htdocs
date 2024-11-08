// 1. Simulamos algunos datos de productos en el carrito y los almacenamos en localStorage
const productosEnCarrito = [
    { nombre: "Producto 1", cantidad: 2 },
    { nombre: "Producto 2", cantidad: 1 },
    { nombre: "Producto 3", cantidad: 4 }
];
localStorage.setItem("producto", JSON.stringify(productosEnCarrito));

// 2. Cargamos los datos del carrito desde localStorage
const productos = JSON.parse(localStorage.getItem("producto")) || [];

// 3. Creamos el HTML para cada producto y lo agregamos al contenedor
let contenidoCarrito = "";

productos.forEach(item => {
    const nombre = item.nombre;
    const cantidad = item.cantidad;

    contenidoCarrito += `
        <div class="producto">
            <h3>${nombre}</h3>
            <button>+</button>
            <input value="${cantidad}" disabled>
            <button>-</button>
        </div>
    `;
});

// 4. Insertamos el contenido en el div del carrito
const divCarrito = document.querySelector(".carritoDesplegable");
divCarrito.innerHTML = contenidoCarrito;
