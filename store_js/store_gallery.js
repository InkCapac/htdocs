// carousel.js

const galleryItems = document.querySelectorAll('.gallery-item');
let currentIndex = 0;

function updateGallery() {
    galleryItems.forEach((el, i) => {
        el.classList.remove('active'); // Elimina la clase activa de las imágenes
        if (i === currentIndex) {
            el.classList.add('active'); // Añadir clase activa a la imagen
        }
    });
}

document.getElementById('prevButton').addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? galleryItems.length - 1 : currentIndex - 1;
    updateGallery();
});

document.getElementById('nextButton').addEventListener('click', () => {
    currentIndex = (currentIndex === galleryItems.length - 1) ? 0 : currentIndex + 1;
    updateGallery();
});
