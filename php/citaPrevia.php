<?php
	session_start();
	if(isset($_GET["salir"])){
        session_destroy();
        header("Location: ../index.php");
    }
?>
<html lang="es">
	<head>
		<title>Elige tu Cita</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/cita.css"/>
		<script src="../js/reloj.js"></script>
	</head>

	<body onload="startTime()">
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px">
		<h2><a href='../index.php'>INICIO</a></h2>
		<?php
			if(isset($_SESSION["usuario"])){
                $nombre=$_SESSION["usuario"];
                echo "<p class ='usu2'><a id='nombre'><b> Bienvenid@: $nombre</b></a><a href='?salir=salir'>Cerrar session</a></p>";				
            }
			if(!isset($_SESSION['usuario'])){
				echo '<center><p class ="texto">Para poder coger cita con nosotros, tienes que ser cliente nuestro.</p><br></center>';
				echo "<center><p class ='texto'>Si aún no lo eres puedes registrarte <a href = 'registro.php'><b>Haciendo click aquí</b></a>.</p></center>";
				echo "<center><p class ='texto'>En el caso de que ya seas cliente solo tienes que iniciar sessión <a href = 'login.php'><b>Haciendo click aquí</b></a>.</p></center>";
				echo '<br><div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3130564"><span style="color:gray;">Hora actual en</span><br />Alcorcón, España</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=Europe%2FMadrid" width="100%" height="140" frameborder="0" seamless></iframe> </div>';
			}else{
		?>
		<center><h1><b>Pide tu cita:</b></h1></center><br>
		<form action ="#">
			<table>
				<td>Indica el dia: <input type="date" name="fecha"></td><tr><br><br>
				<td>Indica la hora: <input type="time" name="hora" ></td><br><tr>
				<td>indica tu dni: <input type="text" name="dni" ></td><br><tr>
			</table>
			<br><input class ='form' type="submit" name="guardar" value="Grabar Cita">
		</form>
		<div id="clockdate">
			<div class="clockdate-wrapper">
					<div id="clock"></div>
						<div id="date"></div>
			</div>
		</div>

	<script language='javascript' type= 'text/javascript' >
	startTime()
	{  }
	</script >	
		

<?php
 
if(isset($_REQUEST['guardar'])){
 $fecha = $_REQUEST['fecha'];   
$hora = $_REQUEST['hora']; 
$lugar = 'Alcorcón (Madrid)';
$dni=$_REQUEST['dni']; 
$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
mysqli_set_charset($conexion, "utf8");	

                
 $insercion = "insert into cita (dia, hora, lugar,dni) values ('$fecha','$hora','$lugar','$dni');";
                $resultado= mysqli_query($conexion, $insercion) or die('Inserción fallida: '. mysqli_error($conexion)); 
	echo '<br>';			
                
				
			mysqli_close($conexion);
			echo "<p class='bien'>Se ha aceptado tu cita del dia : <b>$fecha</b> y hora : <b>$hora</b> </p>";
			
}




}	

?>


</body>

</html>


