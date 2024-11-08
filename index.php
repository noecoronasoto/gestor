<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'backend/conexion_be.php';


// Verificar si ya existe un usuario administrador en la base de datos
$result = $conn->query("SELECT * FROM usuarios WHERE rol = 'Administrador'");

if ($result->num_rows == 0) {
    // Redirige a crear_admin.php solo si no existe ningún administrador
    header("Location: crear_admin.php");
    exit;
}

// Si existe el administrador, redirige a la página de inicio de sesión
header("Location: backend/login.php");

exit;
?>