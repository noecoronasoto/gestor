<?php
include 'conexion_be.php';

// Validar datos del formulario
if (isset($_POST['usuario'], $_POST['contrasena'], $_POST['rol'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Verificar que solo contenga letras y números, sin espacios
    if (!preg_match('/^[a-zA-Z0-9]+$/', $usuario) || !preg_match('/^[a-zA-Z0-9]+$/', $contrasena)) {
        echo "
        <div id='message' style='
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f44336;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            text-align: center;
        '>
            Usuario y contraseña invalidos.
        </div>
        <script>
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    window.location.href = '../plantilla/template/pages/forms/pantallaUsuariosAdmin.php';
                }
            });
        </script>
        ";
        exit; // Detiene la ejecución si los datos son inválidos
    }

    // Encriptar la contraseña
    $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

    // Comprobar si el usuario ya existe
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = ?");
    $check_stmt->bind_param("s", $usuario);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        echo "
        <div id='message' style='
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f44336;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            text-align: center;
        '>
            El usuario ya existe. Presiona Enter para salir.
        </div>
        <script>
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    window.location.href = '../plantilla/template/pages/forms/pantallaUsuariosAdmin.php';
                }
            });
        </script>
        ";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $contrasena, $rol);
        if ($stmt->execute()) {
            echo "
            <div id='message' style='
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #4CAF50;
                color: white;
                padding: 20px;
                border-radius: 10px;
                font-family: Arial, sans-serif;
                text-align: center;
            '>
                Usuario agregado exitosamente. Presiona Enter para salir.
            </div>
            <script>
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        window.location.href = '../plantilla/template/pages/forms/pantallaUsuariosAdmin.php';
                    }
                });
            </script>
            ";
        } else {
            echo "Error al agregar el usuario: " . $conn->error;
        }
        $stmt->close();
    }

    $conn->close();
}
?>