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
                <div class=celda>
                    <div class='celda_peli_img'> 
                        <img src='img/pelicula.jpg' alt='imagen' class='imgCelda'>
                        <p>$nombre </p>
        
                    </div>
                  
                    <div class='botonSocio'>
                        <form action='gestionPrestamos.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$idPeli'>
                            <input type='submit' id='delete_peli' name='delete_peli' value='Eliminar titulo'></p>                          
                        </form>
                    </div>

                    <div class='botonSocio'>
                        <form action='gestionPrestamos.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$idPeli'>
                            <input type='submit' id='ampliar_peli' name='ampliar_peli' value='Ampliar tiempo'></p>                            
                        </form>
                    </div>

                    <div class='botonSocio'>
                    <form action='gestionPrestamos.php' method='POST'>
                        <input type='hidden' name='hidden_id' value='$idPeli'>
                        <input type='submit' id='reportar_danos' name='reportar_danos' value='Reportar daños'></p>
                        <select name='danos' id='danos'>
                        <option value='discoRoto'>Disco Roto</option>
                        <option value='cajaRota'>Caja Rota</option>
                        <option value='discoRayado'>Disco rayado</option>
                        <option value='otros'>otros</option>
                    </select>                          
                    </form>
                    </div>

                    <div class='botonSocio'>
                        <form action='gestionPrestamos.php' method='POST'>
                            <input type='hidden' name='hidden_id' value='$idPeli'>
                            <input type='submit' id='devolver_peli' name='devolver_peli' value='Devolver'></p>                            
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