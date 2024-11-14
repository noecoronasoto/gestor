<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // tu usuario de MySQL
$password = "12345678"; // tu contraseña de MySQL
$dbname = "marketmini"; // nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Usuario y contraseña específicos
$usuario = 'noe777';
$contrasena = '123';

// Hashear la contraseña
$contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

// Consulta SQL para insertar el usuario
$sql = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES ('$usuario', '$contrasenaHasheada', 'Administrador')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

