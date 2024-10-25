<?php 

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: inventario.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/frontend/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body oncopy ="return false" onpaste ="return false">
  <main>

    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="btn__iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aún no tienes una cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="btn__registrarse">Regístrarse</button>
            </div>
        </div>

        <!--Formulario de Login y registro-->
        <div class="contenedor__login-register">
            <!--Login-->
            <form action="backend/loginUsu.php" method="POST" class="formulario__login"> <!-- AGREGAR DELIMITADOR DE LLOS INPUT -->
                <h2>Iniciar Sesión</h2>
                <input type="text" maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122)" placeholder="Usuario" name="corre">
                <input type="password" maxlength="20" placeholder="Contraseña" name="contrasen">
                <button>Entrar</button>
            </form>

            <!--Register-->
            <form action="backend/registro_usua.php" method="POST" class="formulario__register">
                <h2>Regístrarse</h2>
                <input type="text" maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122)"  placeholder="Usuario Nuevo" name="correoNuevo">
                <input type="password" maxlength="20" placeholder="Contraseña" name="contrasenaNueva">
                <button>Regístrarse</button>
            </form>
        </div>
    </div>

</main>


    <script src="assets/JS/script.js"></script>

</body>
</html>