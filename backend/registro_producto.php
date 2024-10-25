<?php 
include 'conexion_be.php';

$productoNuev = $_POST['productoNuevo'];
$cantidadNuev = $_POST['cantidadNueva'];


$verificarProducto = mysqli_query($conn, "SELECT * FROM productos WHERE nombre = '$productoNuev'");

if (mysqli_num_rows($verificarProducto) > 0) {
    echo '<script>
            alert("El producto ya existe");
            window.location = "../pantallaProductosAdmin.php";
          </script>';
} else {
    
    $query = "INSERT INTO productos(nombre, unidades) VALUES('$productoNuev', '$cantidadNuev')"; 
    $ejecutar = mysqli_query($conn, $query);

    if ($ejecutar) {
        echo '<script>
                alert("Producto agregado");
                window.location = "../pantallaProductosAdmin.php";
              </script>';
    } else {
        echo '<script>
                alert("Error al agregar el producto");
                window.location = "../pantallaProductosAdmin.php";
              </script>';
    }
}

mysqli_close($conn);
?>
