<?php
session_start(); 
include_once("includes/consultasBD.php"); 
$bd = new consultasBD(); 
$result = $bd->obtenerPeliculas(); 

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

        <div class="filaPelis">
        <?php
            foreach($result as $fila){ //falta corchete fin 
                $link = "pelicula.php?id=" . $fila["id"];
                $disponible = $fila["disponible"]; 

                if($disponible === "si"){


        ?>
                
            <div class="pelicula">
                <a href=<?php echo "'$link'"?>> <img src='img/pelicula.jpg' alt='imagen'></a>
                <h3 class="info-texto"><?php echo $fila["nombre"];?></h3>            

            </div>

        <?php 
                }
        } 
        ?>
        
        </div>

	<?php
		require('includes/comun/pie.php');
	?>
    </div>

</body>
</html>