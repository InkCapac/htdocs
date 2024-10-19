window.onload = () =>{
    const producto1 = document.querySelector("#producto1");
    const producto2 = document.querySelector("#producto2");
    const producto3 = document.querySelector("#producto3");
    let carrito;
    if(localStorage.producto !== null){
        carrito = localStorage.producto;
    }
    producto1.addEventListener("click", () => {
        añadirProducto(1);
    })
    producto2.onclick =  () => {
        añadirProducto(2);
    }
    producto3.onclick =  () => {
        añadirProducto(3);
    }
    const añadirProducto = (id) => {
        if(buscarProducto + id){
            ("producto"+id)++;
        }else{
            productoNuevo = {
                nombre: "producto"+id,
                cantidad: 1
            }
            carrito.push(productoNuevo)
        }
        localStorage.producto = id;
    }
}



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