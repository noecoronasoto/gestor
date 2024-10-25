<?php 

    include 'conexion_be.php';

    $correoNuev = $_POST['correoNuevo'];
    $contrasenaNuev = $_POST['contrasenaNueva'];
    $contra_encrip = hash('sha512', $contrasenaNuev);

    $query = "INSERT INTO LGNTBL(correo, psswd) VALUES('$correoNuev', 
    '$contra_encrip')"; 


    //validar repeticiones bd
    $verificarCorreo = mysqli_query($conn, "SELECT * FROM LGNTBL WHERE 
    correo = '$correoNuev'");

    if(mysqli_num_rows($verificarCorreo) > 0){
        echo '
        <script>
            alert("Correo ya registrado");
            window.location = "../index.php";
        </script>
        ';
        mysqli_close($conn);
        exit();
    }

    $ejecutar = mysqli_query($conn, $query);

    if($ejecutar){
        echo '<script>alert("Registro Exitoso");
        window.location = "../index.php";
        </script>';
    }else{
        echo '<script>alert("Incorrecto");
        window.location = "../index.php";
        </script>';
    }

    mysqli_close($conn);
    
?>