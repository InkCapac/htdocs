// carousel.js

const galleryItems = document.querySelectorAll('.gallery-item');
let currentIndex = 0;

function updateGallery() {
    galleryItems.forEach((el, i) => {
        el.classList.remove('active'); // Remove active class from all images
        if (i === currentIndex) {
            el.classList.add('active'); // Add active class to the current image
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
