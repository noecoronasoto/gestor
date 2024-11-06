<?php 
    
    session_start();

    include 'conexion_be.php';

    $corr = $_POST['nombre'];
    $contrass = $_POST['password'];
    $contras = hash('sha512', $contrass);

    $validarLogin = mysqli_query($conn, "SELECT * FROM usuarios where 
    nombre = '$corr' and password = '$contras'");

    if(mysqli_num_rows($validarLogin) > 0){
        $_SESSION['usuario'] = $corr;
        header("location: ../pantallaLoginAdmin.php");
        exit;
    }else{
        echo'
        <script>
        alert("Datos incorrectos");
        window.location = "../index.php";
        </script>';
    }

?>