<?php
session_start();
require 'conexion_be.php';

// Verificar si ya existe un usuario administrador
$result = $conn->query("SELECT * FROM usuarios WHERE rol = 'Administrador'");

if ($result->num_rows > 0) {
    // Si ya existe un administrador, redirige a la página de inicio de sesión
    header("Location: backend/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hashea la contraseña

    // Inserta el nuevo administrador
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, 'Administrador')");
    $stmt->bind_param("ss", $usuario, $contrasena);

    if ($stmt->execute()) {
        // Redirige al login una vez que se ha creado el administrador
        header("Location: backend/login.php");
        exit;
    } else {
        $error = "Error al crear el usuario: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Administrador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="admin" required readonly>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <button type="submit">Crear Administrador</button>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    </form>
</body>
</html>
