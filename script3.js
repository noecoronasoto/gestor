function modificarProducto(id, nombre, stock_minimo, stock_max) {
    // Asignar valores a los campos del modal
    document.getElementById('productoId').value = id;
    document.getElementById('nombre').value = nombre;
    document.getElementById('cantidadmin').value = stock_minimo;
    document.getElementById('cantidadmax').value = stock_max;
    
    // Mostrar el modal
    $('#modificarProductoModal').modal('show');
}

function submitModificarProductoForm() {
    var form = document.getElementById('modificarProductoForm');
    form.method = 'POST';
    form.action = '../../../../backend/modificar_producto.php';
    form.submit();
}
