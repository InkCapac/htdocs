// Seleccionar todos los elementos de la galería
const galleryItems = document.querySelectorAll('.gallery-item'); 
let currentIndex = 0; // Índice de la imagen actual

// Función para actualizar la imagen mostrada
function updateGallery() {
    galleryItems.forEach((el, i) => {
        if (i === currentIndex) {
            el.classList.add('active'); // Añadir clase activa a la imagen actual
        } else {
            el.classList.remove('active'); // Eliminar clase activa de otras imágenes
        }
    });
}

// Función para pasar a la siguiente imagen
function nextImage() {
    currentIndex = (currentIndex === galleryItems.length - 1) ? 0 : currentIndex + 1; // Actualizar el índice
    updateGallery(); // Actualizar la galería
}

// Función para pasar a la imagen anterior
function prevImage() {
    currentIndex = (currentIndex === 0) ? galleryItems.length - 1 : currentIndex - 1; // Actualizar el índice
    updateGallery(); // Actualizar la galería
}

// Añadir eventos a los botones
document.getElementById('prevButton').addEventListener('click', prevImage); // Evento para botón anterior
document.getElementById('nextButton').addEventListener('click', nextImage); // Evento para botón siguiente

// Funcionalidad del carrusel automático
let carouselInterval = setInterval(nextImage, 5000); // Cambiar imagen cada 5 segundos (ajustable)

// Función para reiniciar el intervalo del carrusel
function resetCarousel() {
    clearInterval(carouselInterval); // Limpiar intervalo actual
    carouselInterval = setInterval(nextImage, 5000); // Reiniciar intervalo
}

