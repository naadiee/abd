<?php
session_start(); 

?>


<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Perfil</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>
	    

	    <?php
            require('gestionaPerfil.php'); 
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>