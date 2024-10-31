window.onload = () => {
    const botonAbrir = document.querySelector(".derecha button");
    const enviar = document.querySelector("#enviar");
    botonAbrir.onclick = () => {
        const conversacion = document.querySelector(".chat div");
        conversacion.classList.toggle("abierta");
        const texto = botonAbrir.innerText;
        if (texto == "Abrir chat") {
            botonAbrir.innerText == "Cerrar chat";
        } else {
            botonAbrir.innerText == "Abrir chat";
        }
    }
    enviar.onclick = () => {
        const texto = document.querySelector(".chat input").value;
        document.querySelector(".chat input").value = "";
        //texto -> Mandarlo a PHP
        //const response = fetch("./mensajes.php?mensaje="+mensaje");

        //Con esta línea los datos se envían a php sin recargar la página
        fetch("./mensajes.php", {
            body: JSON.stringify({ mensaje: texto }),
            headers:{
                "Content-type": "application/json"
            },
            method: "POST"
        })
        //La siguiente línea transforma los datos en el formato que queramos (text, xml, JSON)
            .then(respuesta => {
                return respuesta.text();
            })
            .then(respuesta2 => {
                console.log(respuesta2);
                const parrafo = document.createElement("p");
                parrafo.className = "servidor";
                parrafo.innerText = respuesta2;
                const conversacion = document.querySelector(".conversacion");
                conversacion.appendChild(parrafo);

                //conversacion.innerHTML = conversacion.innerHTML + "<p class=\"servidor\">" + respuesta2 + "</p>";
            })
    }
}