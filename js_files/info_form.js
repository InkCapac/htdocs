document.addEventListener('DOMContentLoaded', function () {
    const formBox = document.querySelector('.form-box');
    const contactButton = document.querySelector('.contact');
    const loginToggle = document.getElementById('login-toggle');
    const registerToggle = document.getElementById('register-toggle');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const capa = document.getElementById('capa'); // Capa

    // Toggle class to show or hide the form
    contactButton.addEventListener('click', function () {
        formBox.classList.toggle('abierto');
        if (formBox.classList.contains('abierto')) {
            mostrarCapa(); // Show overlay
        } else {
            ocultarCapa(); // Hide overlay
        }
    });

    // Function to show the overlay
    function mostrarCapa() {
        capa.style.display = 'block';
    }

    // Function to hide the overlay
    function ocultarCapa() {
        capa.style.display = 'none';
    }

    // Event listener for the login toggle button
    loginToggle.addEventListener('click', () => {
        loginForm.style.display = 'block'; // Show login form
        registerForm.style.display = 'none'; // Hide register form
        loginToggle.classList.add('active'); // Add active class to login button
        registerToggle.classList.remove('active'); // Remove active class from register button
        mostrarCapa(); // Show overlay
    });

    // Event listener for the register toggle button
    registerToggle.addEventListener('click', () => {
        registerForm.style.display = 'block'; // Show register form
        loginForm.style.display = 'none'; // Hide login form
        registerToggle.classList.add('active'); // Add active class to register button
        loginToggle.classList.remove('active'); // Remove active class from login button
        mostrarCapa(); // Show overlay
    });

    // Optionally, hide the overlay when clicking outside the form
    capa.addEventListener('click', ocultarCapa); // Capa click event
});
