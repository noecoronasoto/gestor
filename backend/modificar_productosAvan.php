<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nuevoNombre = $_POST['nombre'];
    $nuevaCantidad = intval($_POST['cantidad']);

    $updateQuery = "UPDATE productos SET nombre = ?, unidades = ? WHERE id = ?";
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("ssi", $nuevoNombre, $nuevaCantidad, $id);
        $stmt->execute();
        $stmt->close();
        
        // Redirigir de vuelta a la pantalla de productos
        header("Location: /pantallaProductosAvan.php");

        exit;
    }
}
?>
