window.onscroll = function() {
    const navbar = document.querySelector('.navbar');
    const galleryHeight = document.querySelector('.gallery').offsetHeight;

    // Add or remove the 'solid' class based on scroll position
    if (window.scrollY > galleryHeight) {
        navbar.classList.add('solid');
    } else {
        navbar.classList.remove('solid');
    }
};
