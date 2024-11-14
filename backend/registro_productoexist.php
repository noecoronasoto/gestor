<?php 
include 'conexion_be.php';

// Captura los datos del formulario
$productoSeleccionado = $_POST['productoSeleccionado'];
$unidadesNuev = $_POST['unidadNueva'];
$precioNuev = $_POST['precioNuevo'];
$fechaNuev = $_POST['fechaNueva'];
$descripNuev = $_POST['descripNueva'];

// Verifica si el producto existe
$verificarProducto = mysqli_query($conn, "SELECT * FROM productos WHERE nombre = '$productoSeleccionado'");

if (mysqli_num_rows($verificarProducto) > 0) {
    // Actualiza el producto existente
    $query = "UPDATE productos SET unidades='$unidadesNuev', descripcion='$descripNuev', precio_venta='$precioNuev', fecha_ingreso='$fechaNuev' WHERE nombre='$productoSeleccionado'";
    $ejecutar = mysqli_query($conn, $query);

    if ($ejecutar) {
        echo '<script>
                alert("Producto modificado exitosamente");
                window.location="../plantilla/template/pages/forms/altasAdmin.php";
              </script>';
    } else {
        echo '<script>
                alert("Error al modificar el producto");
                window.location="../plantilla/template/pages/forms/altasAdmin.php";
              </script>';
    }
} else {
    echo '<script>
            alert("El producto no existe");
            window.location="../plantilla/template/pages/forms/altasAdmin.php";
          </script>';
}

mysqli_close($conn);
?>
