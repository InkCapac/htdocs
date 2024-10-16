window.onload = () => {
    const boton = document.querySelector(".contact");
    const formulario = document.querySelector(".form-box");

    // Toggle form visibility on button click
    boton.onclick = () => {
        formulario.classList.toggle("abierto");
    };
};
