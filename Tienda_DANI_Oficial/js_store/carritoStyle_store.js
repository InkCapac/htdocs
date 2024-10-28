document.addEventListener('DOMContentLoaded', function () {
    const formBox = document.querySelector('.form-box');
    const contactButton = document.querySelector('.contact');
    const loginToggle = document.getElementById('login-toggle');
    const registerToggle = document.getElementById('register-toggle');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const capa = document.getElementById('capa'); // Capa

    // Alternar clase para mostrar u ocultar el formulario
    contactButton.addEventListener('click', function () {
        formBox.classList.toggle('abierto');
        if (formBox.classList.contains('abierto')) {
            mostrarCapa(); // Mostrar superposición
        } else {
            ocultarCapa(); // Ocultar superposición
        }
    });

    // Función para mostrar la superposición
    function mostrarCapa() {
        capa.style.display = 'block';
    }

    // Función para ocultar la superposición
    function ocultarCapa() {
        capa.style.display = 'none';
    }

    // Event listener para el botón de alternar inicio de sesión
    loginToggle.addEventListener('click', () => {
        loginForm.style.display = 'block'; // Mostrar formulario de inicio de sesión
        registerForm.style.display = 'none'; // Ocultar formulario de registro
        loginToggle.classList.add('active'); // Agregar clase activa al botón de inicio de sesión
        registerToggle.classList.remove('active'); // Quitar clase activa del botón de registro
        mostrarCapa(); // Mostrar superposición
    });

    // Event listener para el botón de alternar registro
    registerToggle.addEventListener('click', () => {
        registerForm.style.display = 'block'; // Mostrar formulario de registro
        loginForm.style.display = 'none'; // Ocultar formulario de inicio de sesión
        registerToggle.classList.add('active'); // Agregar clase activa al botón de registro
        loginToggle.classList.remove('active'); // Quitar clase activa del botón de inicio de sesión
        mostrarCapa(); // Mostrar superposición
    });

    // Opcionalmente, ocultar la superposición al hacer clic fuera del formulario
    capa.addEventListener('click', ocultarCapa); // Evento de clic en capa
});
