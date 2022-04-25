<?php
session_start(); 
include_once("includes/clases/Usuario.php"); 
include_once("includes/SA/usuario_SA.php"); 

$result = array(); 

//Quitamos espacios al final y al principio del string de cada dato recibido y lo guardamos en una variable 
$userID = htmlspecialchars(trim(strip_tags($_POST["userID"]))); 
$pass = htmlspecialchars(trim(strip_tags($_POST["pass"]))); 
$usr_SA = new usuario_SA(); 

$usr = $usr_SA->login($userID, $pass); // funcion que se comunica con la BD, le devuelve una isntancia usuario 

//comprobamos que nos ha devuelto una isntancia valida y extraemos datos del usuario para la sesion actual

if($usr != NULL){  
    $_SESSION['login'] = true; // nos permitira comprobar de fomra mas rapida si el usuario esta conectado
    $_SESSION['userID'] = $usr->getUsuarioID(); 
    $_SESSION['tipoUsuario'] = $usr->getTipoUsuario();
    $_SESSION['nombre'] = $usr->getNombre();
    $_SESSION['esAdmin'] = $usr->getTipoUsuario() === 1 ? true : false; // si tipoUsuario == 1 -> esAdmin en caso contrario false
    $result['exito'] = true;
    //$_SESSION["carro"][0]= 1;// se crea en el momento que se meta un primer elemento en gestionCarro.php
    
    header('location:inicio.php'); 
}
else{
    $result['exito'] = false; 
    $result['errors'] = 'Contraseña o usuario incorrectos'; 
    
    header('location:inicio.php?errorlogin=true');

}

//echo json_encode($result);

?>

