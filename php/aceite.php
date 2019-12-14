<?php
session_unset();
	session_start();
		if(isset($_GET["salir"])){
            session_destroy();
            header("Location: aceite.php");
		}
		if(isset($_SESSION["usuario"])){
			echo "<p class ='usu2'> <b>BIENVENID@: </b>".$_SESSION['usuario']."<br><a href='?salir=salir'>Cerrar session</a></p>";		
		}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/aceite.css"/>
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" ></img>
	<head>
	<body>
		<center><h1>CAMBIO ACEITE:</h1></center>		
				<center><img class='imagenes' src='../img/aceite/cambioaceite.png'></img></center>		
			<li><a href="../index.php">Inicio</a>
		<li><a href="../php/citaprevia.php">PIDE CITA</a>		
		<center><img class='gif' src='../img/aceite/aceitegif.gif'></img></center>	
		<center><img class='img' src='../img/aceite/aceite.jpg'></img></center>	
	</body>
</html>