// JS para la galería de imágenes

const galleryItems = document.querySelectorAll('.gallery-item'); // Selecciona todos los elementos de la galería
let currentIndex = 0; // Índice de la imagen actual

// Función para actualizar la imagen mostrada
function updateGallery() {
    galleryItems.forEach((el, i) => {
        if (i === currentIndex) {
            el.classList.add('active'); // Añade la clase activa a la imagen actual
        } else {
            el.classList.remove('active'); // Elimina la clase activa de las demás imágenes
        }
    });
}

// Función para pasar a la siguiente imagen
function nextImage() {
    currentIndex = (currentIndex === galleryItems.length - 1) ? 0 : currentIndex + 1; // Actualiza el índice
    updateGallery(); // Actualiza la galería
}

// Función para pasar a la imagen anterior
function prevImage() {
    currentIndex = (currentIndex === 0) ? galleryItems.length - 1 : currentIndex - 1; // Actualiza el índice
    updateGallery(); // Actualiza la galería
}

// Añade eventos a los botones
document.getElementById('prevButton').addEventListener('click', prevImage); // Evento para botón anterior
document.getElementById('nextButton').addEventListener('click', nextImage); // Evento para botón siguiente

// Funcionalidad del carrusel automático
let carouselInterval = setInterval(nextImage, 5000); // Cambia la imagen cada 5 segundos (ajusta el tiempo según sea necesario)

// Función para reiniciar el intervalo del carrusel
function resetCarousel() {
    clearInterval(carouselInterval); // Limpia el intervalo actual
    carouselInterval = setInterval(nextImage, 5000); // Reinicia el intervalo
}
