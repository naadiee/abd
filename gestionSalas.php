<?php
session_start(); 
include_once("includes/consultasBD.php"); 
$bd = new consultasBD(); 
$idSocio = $_SESSION["userID"];


if(isset($_POST['asistir'])){

    $idSala = htmlspecialchars(trim(strip_tags($_POST["hidden_id"])));
     
    $bd->addSocioSala($idSala, $idSocio);
    header('Location:sesionesCine.php');


}






?>