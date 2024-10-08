// box_message.js

window.onload = () => {
    const modal = document.querySelector(".modal");
    const fondo = document.querySelector(".fondo");

    // Function to toggle modal and background visibility
    const toggleModal = () => {
        modal.classList.toggle("ocultar");
        fondo.style.display = fondo.style.display === 'none' || fondo.style.display === '' ? 'block' : 'none';
    }

    // Show the modal and dark background immediately when the page loads
    toggleModal();  // Opens the modal and background overlay automatically

    // Close modal and background when 'X' is clicked
    document.querySelector(".x").onclick = () => {
        toggleModal();
    }

    // Close modal and background when 'Cerrar' button is clicked
    document.querySelector(".cerrar").onclick = () => {
        toggleModal();
    }
};
