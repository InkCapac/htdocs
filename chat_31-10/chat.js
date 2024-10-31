window.onload = () => {
    const botonAbrir = document.querySelector(".derecha button");
    botonAbrir.onclick = () => {
        const conversacion = document.querySelector(".chat div");
        conversacion.classList.toggle("abierta");
        texto = botonAbrir.innerText;
        if(texto == "Abrir chat"){
            botonAbrir.innerText == "Cerrar chat";
        }else{
            botonAbrir.innerText == "Abrir chat";
        }
    }
}