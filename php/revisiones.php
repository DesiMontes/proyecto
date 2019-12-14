<?php
session_unset();
	session_start();
		if(isset($_GET["salir"])){
            session_destroy();
            header("Location: revisiones.php");
		}
		if(isset($_SESSION["usuario"])){
			echo "<p class ='usu2'> <b>BIENVENID@: </b>".$_SESSION['usuario']."<br><a href='?salir=salir'>Cerrar session</a></p>";		
		}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/revisiones.css"/>
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" ></img>
	<head>
	<body>
		<center><h1>REVISIÓN:</h1></center>
		<table>
			<tr>
				<td><center><img class='imagenes' src='../img/revisiones/foto1.jpg'></img></center></td>		
			</tr>	
		</table>
		<li><a href="../index.php">Inicio</a>
		<li><a href="../php/citaprevia.php">PIDE CITA</a>
		<center><img class='gif' src='../img/revisiones/revision.gif'></img></center>
		<center><img class='gif2' src='../img/revisiones/elevador.gif'></img></center>
		<video class = 'video' width="310" height="240" controls>
			<source src="../img/revisiones/revision.mp4" type="video/mp4">
			<source src="../img/revisiones/revision.ogg" type="video/ogg">
		</video>
	</body>
</html>