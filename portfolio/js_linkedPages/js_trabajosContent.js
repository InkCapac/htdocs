let jobCount = 0; // Contador de trabajos
const maxJobs = 4; // Límite máximo de trabajos

function anadirTrabajo() {
    if (jobCount < maxJobs) {
        const container = document.getElementById("trabajos-container");
        const div = document.createElement("div");
        div.innerHTML = `
            <label>Trabajo:</label>
            <input type="text" name="trabajos[]">
            <label>Fecha de inicio:</label>
            <input type="date" name="fechas_inicio[]">
            <label>Fecha de fin:</label>
            <input type="date" name="fechas_fin[]">
        `;
        container.appendChild(div);
        jobCount++; // Incrementa el contador
    } else {
        alert("Solo puedes agregar hasta " + maxJobs + " trabajos.");
    }
}
