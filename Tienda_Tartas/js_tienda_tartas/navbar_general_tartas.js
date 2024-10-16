window.onscroll = function () {
    const navbar = document.querySelector('.navbar');
    const imagePlaceholder = document.querySelector('.image-placeholder');

    // Add or remove the 'solid' class based on scroll position
    if (window.scrollY > imagePlaceholder.offsetHeight) {
        navbar.classList.add('solid');
    } else {
        navbar.classList.remove('solid');   
    }
        
};
