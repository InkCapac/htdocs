window.onscroll = function() {
    const navbar = document.querySelector('.navbar');
    const galleryHeight = document.querySelector('.gallery').offsetHeight;

    // Añadir o descartar la clase 'solid' según la posición del scroll
    if (window.scrollY > galleryHeight) {
        navbar.classList.add('solid');
    } else {
        navbar.classList.remove('solid');
    }
};
