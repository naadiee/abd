<?php
session_start(); 
require_once('includes/SA/tienda_SA.php');
$tienda_SA = new tienda_SA(); 

?>


<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Catalogo</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>
	    

	    <?php
            require('mostrarTienda.php'); 
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>