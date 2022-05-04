<?php
session_start(); 
include_once("includes/consultasBD.php"); 


$nombre = htmlspecialchars(trim(strip_tags($_POST["nombre"]))); 
$userID = htmlspecialchars(trim(strip_tags($_POST["userID"])));
$pass = htmlspecialchars(trim(strip_tags($_POST["pass"]))); 
$bd = new consultasBD(); 

$existe = $bd->existeSocio($userID); 

if(!$existe){
    $bd->registrarSocio($nombre, $userID, $pass); 
    //$result['exito'] = true; 
    header('location: index.php?exitoRergistro=true');

}
else{
    header('location:index.php?errorRergistro=true');// se trata en la cabecera

}


?>