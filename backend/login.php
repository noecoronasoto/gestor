<?php 
session_start();
include 'conexion_be.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar el usuario y la contraseña
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario_db = $resultado->fetch_assoc();
        
        // Verifica la contraseña
        if (password_verify($contrasena, $usuario_db['contrasena'])) {
            $_SESSION['usuario'] = $usuario_db['usuario'];
            $_SESSION['rol'] = $usuario_db['rol'];
            
            // Redirige según el rol del usuario
            if ($usuario_db['rol'] === 'Administrador') {
                header("Location: ../plantilla/template/pantallaLoginAdmin.php");
            } elseif ($usuario_db['rol'] === 'Ventas') {
                header("Location: ../plantilla/template/pantallaLoginAvanzado.php");
            }elseif ($usuario_db['rol'] === 'Cliente') {
                header("Location: ../plantilla/template/pantallaLoginBasico.php");
            } else {
                $error = "Rol no reconocido.";
            }
            exit;
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/frontend/stylesLOGIN.css">
    </head>
<body class="login-body">
    <div class="login-container">
        <h2 class="login-title">Iniciar Sesión</h2>
        <form action="" method="POST" class="login-form">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required class="login-input">
            
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required class="login-input">
            
            <button type="submit" class="login-button">Iniciar Sesión</button>
            
            <?php if (!empty($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        </form>
    </div>
</body>
</html>