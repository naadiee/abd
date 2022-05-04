<?php
session_start(); 
include_once("includes/consultasBD.php"); 
$bd = new consultasBD(); 

?>


<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Sala cine</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>

    <?php 

        if(isset($_SESSION['login']) && ($_SESSION['login'] === true)){
        
        
        
            $salas = $bd->getSalas(); 
            
            foreach($salas as $elemento){
                $idPeli = $elemento["idPelicula"];
                $pelicula = $bd->getPelicula($idPeli);
                $nombre = $pelicula['nombre'];       
                $aforo = $elemento["aforo"];  
                $aforo = $elemento["aforo"];
                $numSala = $elemento["id"];    

                echo "
                <div class=celdaProductoCarro>
                    <div class='producto_carro_img'> 
                        <img src='img/sala.jpg' alt='imagen' class='imgProductoCarro'>
                        <p>$nombre </p>
        
                    </div>
                  
                    <div class='botonCancelar'>
                        <form action='gestionSalas.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$numSala'>
                            <input type='submit' id='asistir' name='asistir' value='Asistir'></p>                          
                        </form>
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