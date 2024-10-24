window.onload = () => {
    const modal = document.querySelector(".modal");
    const fondo = document.querySelector(".fondo");

    // Función para alternar la visibilidad del modal y del fondo
    const toggleModal = () => {
        modal.classList.toggle("ocultar");
        fondo.style.display = fondo.style.display === 'none' || fondo.style.display === '' ? 'block' : 'none';
    }

    // Mostrar el modal y el fondo oscuro inmediatamente cuando la página carga
    toggleModal();  // Abre el modal y la superposición de fondo automáticamente

    // Cerrar el modal y el fondo cuando se hace clic en la 'X'
    document.querySelector(".x").onclick = () => {
        toggleModal();
    }

    // Cerrar el modal y el fondo cuando se hace clic en el botón 'Cerrar'
    document.querySelector(".cerrar").onclick = () => {
        toggleModal();
    }
};
