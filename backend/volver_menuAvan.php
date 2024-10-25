<?php 
    session_start();
    session_destroy();
    header("location: ../pantallaLoginAvanzado.php");
?>