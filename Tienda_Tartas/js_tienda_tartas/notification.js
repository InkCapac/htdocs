document.addEventListener('DOMContentLoaded', function() {
    const notification = document.querySelector('.notification');
    if (notification) {
        notification.addEventListener('click', function() {
            this.style.opacity = '0'; // Desvanecer la notificación
            setTimeout(() => {
                this.remove(); // Eliminar la notificación después de desvanecer
            }, 500); // Hacer coincidir el tiempo de espera con la duración de la transición CSS
        });
    }
});
