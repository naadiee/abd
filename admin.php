<?php session_start();?>

<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Admin</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>
	    <div id="content_area">
        <h1>Controles administrador</h1>
	    	<div class="botones_noticias"> 
				<form action = "gestionarAdmin.php" method ="POST">
					<input class="boton" type="submit"  name = "subirProducto" value='Subir Producto' selected /> 
                    <input class="boton" type="submit"  name = "editarProducto" value='Editar Producto' selected /> 
					<input class="boton" type="submit"  name = "eliminarValora" value='Eliminar Valoracion' /> 
					
				</form>
			</div>
			
		</div>

	    <?php
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>