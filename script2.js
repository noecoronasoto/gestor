// Esperamos a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".forms-sample");

    // Evento para el envío del formulario
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Evitamos el envío por defecto del formulario

        // Obtenemos los valores de los campos
        const productoNuevo = document.getElementById("productoNuevo").value.trim();
        const fechaNueva = document.getElementById("fechaNueva").value.trim();
        const unidadNueva = document.getElementById("unidadNueva").value.trim();
        const precioNuevo = document.getElementById("precioNuevo").value.trim();
        const stockNuevo = document.getElementById("stockNuevo").value.trim();
        const stockMinNuevo = document.getElementById("stockminNuevo").value.trim();
        const descripNueva = document.getElementById("descripNueva").value.trim();

        // Validación simple de campos vacíos
        if (!productoNuevo || !fechaNueva || !unidadNueva || !precioNuevo || !stockNuevo || !stockMinNuevo || !descripNueva) {
            alert("Por favor, completa todos los campos.");
            return; // Salimos de la función si hay campos vacíos
        }

        // Si todos los campos están completos, enviamos el formulario
        form.submit(); // Esto enviará el formulario al servidor
    });
});
