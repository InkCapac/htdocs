    window.onload = () => {
        const boton = document.querySelector(".contact");
        const formulario = document.querySelector(".form-box");

        boton.onclick = () => {
            formulario.classList.toggle("abierto");
        };
    };