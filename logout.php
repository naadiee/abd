<?php
    session_start(); //necesario para ejecutar el siguiente codigo
    session_destroy(); // cierra la sesion
    session_unset(); // liberamos todas las variables de sesion
    header('location:index.php'); // redirigimos al inicio

?>