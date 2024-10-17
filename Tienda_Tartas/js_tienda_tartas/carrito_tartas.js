window.onload = () => {
    const boton = document.querySelector(".contact");
    const formulario = document.querySelector(".form-box");

    // Alternar la visibilidad del formulario al hacer clic en el botón
    boton.onclick = () => {
        formulario.classList.toggle("abierto");
    };
};
