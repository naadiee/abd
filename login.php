<?php session_start();?>

<!DOCTYPE html> 

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta charset="utf-8">
	<title>Login</title>
</head>

<body>
    <div id = "contenedor">
		
        <?php require('includes/comun/cabecera.php');?>
	    
        <div id="content_area">
        <fieldset>
                <legend> Iniciar Sesión </legend>
                <form action="comprobarLogin.php" method="POST">
                    <div><label>ID</label>
                        <input type="text" name="userID" required>
                    </div>

                    <div><label>Contraseña</label>
                        <input type="password"  name="pass" required>
                    </div>
                    <div>
                        <button  type="submit">Entrar</button>
                    </div>
                </form>

             </fieldset>
        
             <?php 
                echo "¿No eres miembro? <a href='registro.php'> Unete a nosotros</a> " ;
            ?>

        </div>
    

	    <?php
			require('includes/comun/pie.php');
		?>
    </div>

</body>
</html>