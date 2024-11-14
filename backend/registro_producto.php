<?php
include 'conexion_be.php';

// Captura y sanitiza los datos del formulario
$productoSeleccionado = trim($_POST['productoSeleccionado']);
$unidadesNuev = intval($_POST['unidadNueva']);
$precioNuev = floatval($_POST['precioNuevo']);
$fechaNuev = trim($_POST['fechaNueva']);
$descripNuev = trim($_POST['descripNueva']);

// Verifica si el producto existe y obtiene las unidades actuales y el stock máximo
$stmt = $conn->prepare("SELECT unidades, stock_maximo FROM productos WHERE nombre = ?");
$stmt->bind_param("s", $productoSeleccionado);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Obtiene los resultados
    $stmt->bind_result($unidadesExistentes, $stockMaximo);
    $stmt->fetch();

    // Calcula las nuevas unidades totales
    $nuevasUnidades = $unidadesExistentes + $unidadesNuev;

    // Verifica que no se supere el stock máximo
    if ($nuevasUnidades <= $stockMaximo) {
        // Prepara la actualización del producto
        $updateStmt = $conn->prepare("UPDATE productos SET unidades = ?, descripcion = ?, precio_venta = ?, fecha_ingreso = ? WHERE nombre = ?");
        $updateStmt->bind_param("isdss", $nuevasUnidades, $descripNuev, $precioNuev, $fechaNuev, $productoSeleccionado);
        
        if ($updateStmt->execute()) {
            echo '<script>
                    alert("Producto modificado exitosamente");
                    window.location="../plantilla/template/pages/forms/altasAdmin.php";
                  </script>';
        } else {
            // Error al ejecutar la actualización
            echo '<script>
                    alert("Error al modificar el producto. Por favor, intenta nuevamente.");
                    window.location="../plantilla/template/pages/forms/altasAdmin.php";
                  </script>';
        }
        $updateStmt->close();
    } else {
        // Las nuevas unidades exceden el stock máximo
        echo '<script>
                alert("No se puede actualizar. Las unidades superan el stock máximo de ' . $stockMaximo . ' unidades.");
                window.location="../plantilla/template/pages/forms/altasAdmin.php";
              </script>';
    }
} else {
    // El producto no existe en la base de datos
    echo '<script>
            alert("El producto seleccionado no existe.");
            window.location="../plantilla/template/pages/forms/altasAdmin.php";
          </script>';
}

$stmt->close();
$conn->close();
?>
