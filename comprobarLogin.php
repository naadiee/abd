<?php
session_start(); 
include_once("includes/consultasBD.php"); 


$result = array(); 

//Quitamos espacios al final y al principio del string de cada dato recibido y lo guardamos en una variable 
$userID = htmlspecialchars(trim(strip_tags($_POST["userID"]))); 
$pass = htmlspecialchars(trim(strip_tags($_POST["pass"]))); 
$bd = new consultasBD(); 

$exito = $bd->login($userID, $pass); 

if($exito === TRUE){
    $_SESSION['login'] = true; // nos permitira comprobar de fomra mas rapida si el usuario esta conectado
    $_SESSION['userID'] = $userID; 
    
    $_SESSION['nombre'] = $bd->getNombreSocio($userID); 
    $result['exito'] = true;    
    header('location:index.php'); 

}
else{
    $result['exito'] = false; 
    $result['errors'] = 'Contraseña o usuario incorrectos'; 
    
    header('location:index.php?errorlogin=true');

}


?>

