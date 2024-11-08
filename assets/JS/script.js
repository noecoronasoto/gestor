// Función para abrir el modal de agregar usuario
function abrirModal() {
    const modalAgregar = document.getElementById('modalAgregarUsuario');
    modalAgregar.style.display = 'flex'; // Muestra el modal como flex para centrarlo
}

// Función para cerrar el modal de agregar usuario
function cerrarModal() {
    const modalAgregar = document.getElementById('modalAgregarUsuario');
    modalAgregar.style.display = 'none'; // Oculta el modal
}

// Función para abrir el modal de eliminar usuario con el ID del usuario
function abrirModalEliminar(id) {
    const modalEliminar = document.getElementById('modalEliminarUsuario');
    modalEliminar.style.display = 'flex'; // Muestra el modal como flex para centrarlo
    
    // Establece el ID del usuario en el campo oculto dentro del formulario
    const idUsuarioEliminar = document.getElementById('idUsuarioEliminar');
    idUsuarioEliminar.value = id;
}

// Función para cerrar el modal de eliminar usuario
function cerrarModalEliminar() {
    const modalEliminar = document.getElementById('modalEliminarUsuario');
    modalEliminar.style.display = 'none'; // Oculta el modal
}

// Cierra los modales cuando se hace clic fuera del contenido del modal
window.onclick = function(event) {
    const modalAgregar = document.getElementById('modalAgregarUsuario');
    const modalEliminar = document.getElementById('modalEliminarUsuario');
    if (event.target === modalAgregar) {
        modalAgregar.style.display = 'none';
    } else if (event.target === modalEliminar) {
        modalEliminar.style.display = 'none';
    }
};