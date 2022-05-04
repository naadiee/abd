<div id="cabecera">

	<div id="bienvenida">
	<?php
		if(isset($_SESSION['login']) && ($_SESSION['login'] === true)){ // comprobamos que existe la variable login y ademas comprobamos que estamos loggeados

			$user = $_SESSION['nombre']; 
			echo "<a href=perfil.php>$user</a> | <a href=logout.php>Logout</a>";

		}
		else{ // se comprueba si ha habiado en caso que no se meta en nunguna rama de ifs es que no se ha iniciado sesion todavia

			if(isset($_GET["errorlogin"]) && $_GET["errorlogin"] == 'true'){
				echo "<div style='color:red'>Datos incorrectos </div>";

			}
			if(isset($_GET["errorRergistro"]) && $_GET["errorRergistro"] == 'true'){
				echo "<div style='color:red'>Fallo al registrar usuario registrado</div>";


			}
			if(isset($_GET["exitoRergistro"]) && $_GET["exitoRergistro"] == 'true'){
				echo "<div style='color:green'>Registro con exito!</div>";
			}

			echo " <a href='login.php'>Login</a> | <a href='registro.php'>Registrarse</a>";
		}
		?>
	</div>
	<div id= "titulo">
		<a href = "index.php"><img id = 'logo' src="img/logo.png"  alt="img1"></a>
	</div>
</div>
<nav id="navigator">
	<ul id = "nav">
		<li><a href="index.php">Inicio</a></li>
        <li><a href="catalogo.php">Catalogo</a></li>
		<li><a href="favoritos.php">Sugerencias</a></li>
       
		
			<?php
				if(isset($_SESSION['login']) && $_SESSION['login'] ===true){//$_SESSION['esAdmin'] ===true quitar para entrar en modo admin sin ser admin 
					echo "<li><a href='adquisiciones.php'>Adquisiciones</a>";
				}

			?>

   	</ul>
</nav>