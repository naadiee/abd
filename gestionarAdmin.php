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
    
        <?php
if(isset($_POST['subirProducto'])){
    ?>
     <div class="derecha">
                    <!--Publicar producto-->
                    <div class="titu">
                    <h2>subir producto</h2>
                    </div>
                    <div class="formSubProducto">
                    <form class="formulario" action="procesarSubirProducto.php" method="POST" enctype="multipart/form-data">
                        
                     
                            
                       
                        <div class="nombre">
                        <input name="nombre-producto" type="text" placeholder="Nombre" required>
                        </div>

              
                        <div class="precio">
                        <input name="nombre-producto" type="text" placeholder="Precio" required>
                        </div>
                        <div class="talla">
                        <input name="nombre-producto" type="text" placeholder="Talla" required>
                        </div>
                        
                        <!--imagen-->
                        <div class="imgContenedor">
                        <label for="img">Imagen producto:</label>
                        <input type="file" name="img" />
                        </div>
                        
                        <div class="btnSubmit">
                        <input type="submit" id="file-producto" name="subir" value="Subir producto"> 
                        </div>
                    </form> 
                    </div>           
                </div>
<?php
}
if(isset($_POST['editarProducto'])){
    echo "editar producto";
}
if(isset($_POST['eliminarValora'])){
    echo "eliminar producto";
}

?>

        
		</div>

	    <?php
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>