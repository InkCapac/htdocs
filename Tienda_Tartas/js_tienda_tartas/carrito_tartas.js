    // JavaScript to toggle the form box visibility
    window.onload = () => {
        const boton = document.querySelector(".contact");
        const formulario = document.querySelector(".form-box");

        // Toggle the visibility of the form on button click
        boton.onclick = () => {
            formulario.classList.toggle("abierto"); // This controls hiding and revealing the form
        };
    };