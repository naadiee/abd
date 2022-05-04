<?php session_start();?>

<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>registro</title>
</head>

<body>
    <div id = "contenedor">
		
        <?php require('includes/comun/cabecera.php');?>
	    
        <div id="content_area">
            <div class="introducirDatos">
                <fieldset>
                    <legend> Registro </legend>
                    <form action="comprobarRegistro.php" method="POST">
                        <div>
                            <label>Nombre de usuario</label>
                                <input type="text"  name="nombre" required>
                        </div>
                        <div>
                            <label>DNI</label>
                                <input type="text"  name="userID" required>
                        </div>

                        <div>
                            <label>Contraseña</label>
                                <input type="password" autocomplete="on" name="pass" required>
                        </div>
                    
                        <div class="b">
                            <button type="submit" id="submit_registrar" name="submit_registrar">Continuar</button>
                        </div>
                    </form>

                </fieldset>

            </div>
        

            <?php 
                echo "¿Ya eres miembro? <a href='registro.php'> Inicia sesión</a> " 
            ?>


        </div>
    

	    <?php
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>