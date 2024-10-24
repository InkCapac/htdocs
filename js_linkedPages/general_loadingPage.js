window.onload = function () {
    var preloader = document.getElementById('loader');
    preloader.style.opacity = '0'; // Comienza a desvanecerse

    // Después del desvanecimiento, elimina el cargador de la página
    setTimeout(function () {
        preloader.style.display = 'none';
    }, 1000); // Espera a que la transición (1 segundo) se complete antes de eliminar el cargador
};
