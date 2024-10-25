document.addEventListener("DOMContentLoaded", function() {
    // Mostrar/ocultar la barra lateral
    document.getElementById("boton").addEventListener("click", mostrarDialogo);

    function mostrarDialogo() {
        const dialogo = document.getElementById("dialogo");
        dialogo.classList.toggle("mostrar");
    }

    // Modal para agregar producto
    var modalAgregar = document.getElementById("modalAgregarProducto");
    var btnAgregar = document.querySelector(".BtnAgregarP");
    var spanCerrarAgregar = document.getElementsByClassName("close")[0];

    // Cuando el usuario haga clic en el botón, abre el modal de agregar
    btnAgregar.onclick = function() {
        modalAgregar.style.display = "block";
    }

    // Cuando el usuario haga clic en <span> (x), cierra el modal de agregar
    spanCerrarAgregar.onclick = function() {
        modalAgregar.style.display = "none";
    }

    // Cuando el usuario haga clic fuera del modal, lo cierra
    window.onclick = function(event) {
        if (event.target == modalAgregar) {
            modalAgregar.style.display = "none";
        }
    }

    // Modal para eliminar producto
    var modalEliminar = document.getElementById("modalEliminarProducto");
    var btnEliminar = document.querySelector(".BtnEliminarP");
    var spanCerrarEliminar = modalEliminar.getElementsByClassName("close")[0];
    var btnCancelarEliminar = document.getElementById("cancelarEliminar");

    // Al hacer clic en el botón Eliminar, verifica si hay productos seleccionados
    btnEliminar.onclick = function() {
        const checkboxes = document.querySelectorAll('input[name="seleccionarProducto"]:checked');
        const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);

        if (selectedIds.length > 0) {
            document.getElementById("productoId").value = JSON.stringify(selectedIds);
            modalEliminar.style.display = "block"; // Abre el modal de confirmación de eliminación
        } else {
            alert("Por favor, seleccione al menos un producto para eliminar.");
        }
    }

    // Cierra el modal de eliminar al hacer clic en (x)
    spanCerrarEliminar.onclick = function() {
        modalEliminar.style.display = "none";
    }

    // Cierra el modal de eliminar al hacer clic en "Cancelar"
    btnCancelarEliminar.onclick = function() {
        modalEliminar.style.display = "none";
    }

    // Enviar la solicitud de eliminación al confirmar
    document.getElementById("formEliminarProducto").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que el formulario recargue la página

        const selectedIds = JSON.parse(document.getElementById("productoId").value);

        fetch("backend/eliminar_producto.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ productoIds: selectedIds })
        })
        .then(response => response.text()) // Cambiar a .text() para ver el contenido exacto de la respuesta
        .then(text => {
            console.log("Respuesta del servidor:", text); // Muestra la respuesta en consola
            let data;
            try {
                data = JSON.parse(text); // Intenta convertir la respuesta a JSON
            } catch (error) {
                console.error("Error al analizar JSON:", error.message);
                alert("Error en la respuesta del servidor. Revisa la consola para más detalles.");
                return;
            }

            if (data.success) {
                alert("Productos eliminados con éxito");
                location.reload(); // Recarga la página para reflejar los cambios
            } else {
                alert("Error al eliminar productos: " + (data.error || "Error desconocido."));
            }
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
            alert("Hubo un error en la solicitud. Verifica la consola para más detalles.");
        });
    });

    // Funcionalidad para el modal de modificar producto
    var modalModificar = document.getElementById("modalModificarProducto");
    var spanCerrarModificar = modalModificar.getElementsByClassName("close")[1]; // Asumiendo que el segundo "close" es para el modal de modificar

    // Cerrar el modal de modificar
    spanCerrarModificar.onclick = function() {
        cerrarModalModificar();
    }

    // Cerrar el modal de modificar al hacer clic fuera
    window.onclick = function(event) {
        if (event.target == modalModificar) {
            cerrarModalModificar();
        }
    }
});

// Funciones para abrir y cerrar el modal de modificar
function abrirModalModificar(id, nombre, cantidad) {
    document.getElementById('productoId').value = id;
    document.getElementById('nombreProducto').value = nombre;
    document.getElementById('cantidadProducto').value = cantidad;
    document.getElementById('modalModificarProducto').style.display = 'block';
}

function cerrarModalModificar() {
    document.getElementById('modalModificarProducto').style.display = 'none';
}
