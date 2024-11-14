<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nuevoNombre = $_POST['nombre'];
    $cantidadmin = intval($_POST['cantidadmi']);
    $cantidadmax = intval($_POST['cantidadma']);

    $updateQuery = "UPDATE productos SET nombre = ?, stock_minimo = ?, stock_max = ? WHERE id = ?";
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("siii", $nuevoNombre, $cantidadmin, $cantidadmax, $id);
        $stmt->execute();
        $stmt->close();
        
        // Redirigir de vuelta a la pantalla de productos
        header("Location: ../plantilla/template/pages/forms/pantallaProductosAdmin.php"); 
        exit;
    } else {
        echo "Error al preparar la consulta.";
    }
}
?>
