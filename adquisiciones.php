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
	<title>Adquisiciones</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>

    <?php 

        if(isset($_SESSION['login']) && ($_SESSION['login'] === true)){
        
        
        
            $prestamosSocio = $bd->obtenerPrestamoSocio($_SESSION["userID"]); 
            
            foreach($prestamosSocio as $elemento){
                $idPeli = $elemento["idPelicula"];
                $pelicula = $bd->getPelicula($idPeli);
                $nombre = $pelicula['nombre'];                 

                echo "
                <div class=celdaProductoCarro>
                    <div class='producto_carro_img'> 
                        <img src='img/pelicula.jpg' alt='imagen' class='imgProductoCarro'>
                        <p>$nombre </p>
        
                    </div>
                  
                    <div class='botonCancelar'>
                        <form action='gestionPrestamos.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$idPeli'>
                            <input type='submit' id='add' name='delete_peli' value='Eliminar titulo'></p>                            </form>
                    </div>
                    <div class='botonCancelar'>
                        <form action='gestionPrestamos.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$idPeli'>
                            <input type='submit' id='add' name='ampliar_peli' value='Ampliar tiempo'></p>                            </form>
                    </div>

                    <div class='botonCancelar'>
                    <form action='gestionPrestamos.php' method='POST'>
                        <input type='hidden' name='hidden_id' value='$idPeli'>
                        <input type='submit' id='add' name='reportar_daños' value='Reportar daños'></p>                            </form>
                </div>
        
                

                </div>
    
    ";



            }
            
        }


    ?>




	<?php require('includes/comun/pie.php');?>

    </div>

</body>
</html>