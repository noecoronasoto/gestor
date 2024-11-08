<?php
include 'conexion_be.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Consulta para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario eliminado correctamente.'); window.location.href = '../plantilla/template/pages/forms/pantallaUsuariosAdmin.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario: " . $conn->error . "'); window.location.href = '../usuarios.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('ID de usuario no proporcionado.'); window.location.href = '../usuarios.php';</script>";
}
?>
