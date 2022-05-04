<?php
session_start(); 
include_once("includes/consultasBD.php"); 
$bd = new consultasBD(); 
$idSocio = $_SESSION["userID"];


if(isset($_POST['add_peli'])){
    $idPeli = htmlspecialchars(trim(strip_tags($_POST["hidden_id"]))); 
    $idSocio = htmlspecialchars(trim(strip_tags($_POST["hidden_idSocio"])));  
//echo $idPeli; 
//echo "--";
//$idReserva = strval($bd->contarPrestamo()); 
    $idReserva = $bd->contarPrestamo() + 1; 
//echo $idReserva;  
    $bd->resgistrarPrestamo($idReserva, $idSocio,$idPeli);

    header('Location:catalogo.php');

}

if(isset($_POST['delete_peli'])){

    $idPeli = htmlspecialchars(trim(strip_tags($_POST["hidden_id"]))); 

    $bd->eliminarPrestamo($idSocio,$idPeli);
    header('Location:adquisiciones.php');

  


}

if(isset($_POST['ampliar_peli'])){
    $idPeli = htmlspecialchars(trim(strip_tags($_POST["hidden_id"]))); 

    //$prestamosSocio = $bd->obtenerPrestamoSocio($_SESSION["userID"]); 
    //foreach($prestamosSocio as $elemento){
      //  $fecha = $elemento["fechaInicio"];

        //$separar = (explode("-",$fecha));
        //$nuevoMes = $separar[1] + 1;
        //$nuevaFecha =  $separar[0]."-".  $nuevoMes ."-".  $separar[2]; 
        //echo $nuevaFecha; 
        //echo "/";
   // }       
   
    $prestamoSocio = $bd->datosPrestamo($idSocio, $idPeli); 
    $idPrestamo = $prestamoSocio["id"]; 
    //echo $prestamoSocio["fechaInicio"]; 
    $oldDate = $prestamoSocio["fechaInicio"];
    $separar = (explode("-",$oldDate));
    $nuevoMes = $separar[1] + 1;
    $nuevaFecha =  $separar[0]."-".  $nuevoMes ."-".  $separar[2];
    //echo $idPrestamo;  
    $bd->ampliarFechaPrestamo($idPrestamo, $nuevaFecha); 
    header('Location:adquisiciones.php');


}

if(isset($_POST['reportar_danos'])){
    $danos = htmlspecialchars(trim(strip_tags($_POST["danos"])));
    $idPeli = htmlspecialchars(trim(strip_tags($_POST["hidden_id"]))); 

    //echo $danos; 
    $bd->addPeliculaRota($idPeli,$idSocio, $danos);
    header('Location:adquisiciones.php');
 



}

if(isset($_POST['devolver_peli'])){
    $idPeli = htmlspecialchars(trim(strip_tags($_POST["hidden_id"]))); 

    $res = $bd->existePeliRota($idPeli); 

    if($res === TRUE){
        $bd->peliculaNoDisponible($idPeli); 

    }
 
    $bd->eliminarPrestamo($idSocio, $idPeli); 
    header('Location:adquisiciones.php');


}







//UPDATE prestamo SET idPelicula = "1" WHERE idSocio = "06015058" AND idPelicula = "7"
?>
