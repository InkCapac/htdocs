window.onscroll = function () {
    const navbar = document.querySelector('.navbar');
    const imagePlaceholder = document.querySelector('.image-placeholder');

    // Agregar o quitar la clase 'solid' según la posición de desplazamiento
    if (window.scrollY > imagePlaceholder.offsetHeight) {
        navbar.classList.add('solid');
    } else {
        navbar.classList.remove('solid');   
    }
};
