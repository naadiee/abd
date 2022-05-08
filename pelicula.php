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
	<title>Pelicula</title>
</head>

<body>
    <div id = "contenedor">
		
    <?php require('includes/comun/cabecera.php');?>

    <?php
    if(isset($_SESSION['login']) && ($_SESSION['login'] === true)){
        $idSocio = $_SESSION["userID"];
        $datos = $bd->getPelicula($_GET['id']); // conseguimos toda la info para mostrarla 
        
        $nombre = $datos['nombre'];         
        $id = $_GET['id']; 

        if(isset($_SESSION['login']) && ($_SESSION['login'] === true)){
            $sePuede = 'enabled';
        }
        else{
            $sePuede = 'disabled';
        }
        

        echo "
    
            <div class='mostrarPelicula'>
            <div class='peli_img'> 
                <img src='img/pelicula.jpg' alt='imagen' class='imgPelicula'>
            </div> 

            <div class='datosPeli'>
                <p><strong>$nombre</strong></p> 
                <form action='gestionPrestamos.php' method='POST'>
                <input type='hidden' name='hidden_id' value='$id'>
                <input type='hidden' name='hidden_idSocio' value='$idSocio'>

                <br>
                <input type='submit' id='add' name='add_peli' value='Seleccionar titulo' $sePuede></p>
                </form>
            </div>
            </div>";
    }
    ?>

	
	<?php
		require('includes/comun/pie.php');
	?>
    </div>

</body>
</html>