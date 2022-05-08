<?php 
session_start();
//require_once('includes/create_bd.php');
?>

<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Inicio</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>
	    <div id="content_area">
            <div class="construccion">
                <img src='img/construccion.png' alt='imagen'>
            </div>
            
		</div>

	    <?php
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>

