window.onload = () =>{
    const producto1 = document.querySelector("#producto1");
    const producto2 = document.querySelector("#producto2");
    const producto3 = document.querySelector("#producto3");
    let carrito;
    if(localStorage.producto !== null){
        //Con JSON convertimos un string o texto en arrays o objetos de JSON
        carrito = JSON.parse(localStorage.producto);
    }else{
        //Los '[]' son para los arrays
        carrito=[];
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
        //.find() para buscar dentro del carrito
        const productoBuscado = carrito.find(producto => producto.id == id);
        if(productoBuscado != null){
            ("producto"+id)++;
        }else{
            productoNuevo = {
                id: id,
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