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
    // Obtener las unidades actuales y el stock_max
    $producto = mysqli_fetch_assoc($verificarProducto);
    $unidadesActuales = $producto['unidades'];
    $stockMax = $producto['stock_max'];

    // Sumar las unidades nuevas a las unidades actuales
    $unidadesTotales = $unidadesActuales + $unidadesNuev;

    // Verifica si las unidades no superan el stock máximo
    if ($unidadesTotales <= $stockMax) {
        // Actualiza el producto existente
        $query = "UPDATE productos SET unidades='$unidadesTotales', descripcion='$descripNuev', precio_venta='$precioNuev', fecha_ingreso='$fechaNuev' WHERE nombre='$productoSeleccionado'";
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
                alert("No puedes exceder el stock máximo del producto.");
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