<?php
session_start(); 
require_once('includes/SA/producto_SA.php'); 

$producto_SA = new producto_SA(); 
?>

<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Producto</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>
	    

	    <?php
            require('mostrarProducto.php'); 
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>