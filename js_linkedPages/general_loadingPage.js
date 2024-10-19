window.onload = function () {
    var preloader = document.getElementById('loader');
    preloader.style.opacity = '0'; // Start fading out

    // After the fade-out, remove the loader from the page
    setTimeout(function () {
        preloader.style.display = 'none';
    }, 1000); // Wait for the transition (1 second) to complete before removing the loader
};