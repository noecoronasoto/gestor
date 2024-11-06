<?php 
include 'conexion_be.php';

// Captura los datos del formulario
$productoNuev = $_POST['productoNuevo'];
$unidadesNuev = $_POST['unidadNueva'];
$precioNuev = $_POST['precioNuevo'];
$stockNuev = $_POST['stockNuevo'];
$stockminNuev = $_POST['stockminNuevo'];
$fechaNuev = $_POST['fechaNueva'];
$descripNuev = $_POST['descripNueva'];

$verificarProducto = mysqli_query($conn, "SELECT * FROM productos WHERE nombre = '$productoNuev'");

if (mysqli_num_rows($verificarProducto) > 0) {
    echo '<script>
            alert("El producto ya existe");
            window.location="../plantilla/template/pages/forms/altasAdmin.php";
          </script>';
} else {
    
    $query = "INSERT INTO productos (nombre,unidades,descripcion,precio_venta,stock_minimo,stock_max,fecha_ingreso ) VALUES('$productoNuev', '$unidadesNuev', '$descripNuev', '$precioNuev','$stockminNuev','$stockNuev','$fechaNuev')"; 
    $ejecutar = mysqli_query($conn, $query);

    if ($ejecutar) {
        echo '<script>
                alert("Producto agregado");
                window.location="../plantilla/template/pages/forms/altasAdmin.php";
              </script>';
    } else {
        echo '<script>
                alert("Error al agregar el producto");
                window.location="../plantilla/template/pages/forms/altasAdmin.php";
              </script>';
    }
}

mysqli_close($conn);
?>
