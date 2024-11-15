<?php 
include 'conexion_be.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para mayor seguridad
    $query = "DELETE FROM productos WHERE id = $id";
    $conn->query($query); // Ejecutar la consulta

    // Redirigir de vuelta a la pantalla de productos
    header("Location: ../plantilla/template/pages/forms/pantallaProductosAdmin.php ");
    exit; // Asegurarse de que no se ejecute más código después de redirigir
}
?>


