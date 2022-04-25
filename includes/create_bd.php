<?php


$serverName = "localhost"; // 
$userBD = "root"; 
$contrasena = ""; 




$conn = new mysqli($serverName, $userBD, $contrasena) or die("Fallo en la conexion"); // creamos la conexion 

$conn->query("CREATE DATABASE prueba2");


?>