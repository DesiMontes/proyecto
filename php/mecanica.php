<?php
session_unset();
	session_start();
		if(isset($_GET["salir"])){
            session_destroy();
            header("Location: shop.php");
		}
		if(isset($_SESSION["usuario"])){
			echo "<p class ='usu2'> <b>BIENVENID@: </b>".$_SESSION['usuario']."<br><a href='?salir=salir'>Cerrar session</a></p>";		
		}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/mecanica.css"/>
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" ></img>
	<head>
	<body>
		<center><h1>MECANICA & ELECTRICIDAD</h1></center>
		<li><a href="../index.php">Inicio</a>
		<table>
			<tr>
				<td><center><img class='imagenes' src='../img/mecanica/alternador.jpg'></img></center></td>
				<td><center><img class='imagenes' src='../img/mecanica/Diagnosis electronica.jpg'></img></center></td>
				<td><center><img class='imagenes' src='../img/mecanica/guardapolvos.jpg'></img></center></td>
				<td><center><img class='imagenes' src='../img/mecanica/motor de arranque.png'></img></center></td>
				<td><center><img class='imagenes' src='../img/mecanica/bateria.jpg'></img></center></td>
			</tr>
			<tr>
				<td><p>Te cambiamos el alternador para la segupridad de tu coche.</p></td>
				<td><p>Detectamos Cualquier tipo de averia que el vehiculo pueda tener a traves de electronica.</p></td>
				<td><p>Son los fuelles que cubren los palieres de la transmisión del coche. Su función principal es evitar que entre suciedad por las juntas en la transmisión.</p></td>
				<td><p>No espere a tener una avería, cambie su motor de arranque al primer signo de debilidad. Normalmente, un motor de arranque desgastado no aguanta el paso de un invierno..</p></td>
				<td><p>DeteMontaje de la nueva batería (producto no incluido) y revisión del sistema de carga eléctrico.</p></td>
			</tr>
				<td><p><b><center>AVERIAS FRECUENTES:</center></b></p><p>¿Luz del alternador encendida? Algo pasa</p><p>Bajo voltaje de la batería</p><p></p>¿Escuchas ruidos extraños?</td>
				<td><p><b><center>AVERIAS FRECUENTES:</center></b></p><p>pérdida de potencia.</p><p> fallos y deficiencias de funcionamiento del motor</p><p>será imposible arrancar el vehículo</p></td>
				<td><p><b><center>AVERIAS FRECUENTES:</center></b></p><p>pierde la grasa</p><p> se escucha un claqueteo al mover la dirección</p><p>el vehículo deja de avanzar</p></td>
				<td><p><b><center>AVERIAS FRECUENTES:</center></b></p><p>El coche no arranca a la primera</p><p>Llega el frío y a menudo a tu vehículo le cuesta mucho arrancar</p><p> Al girar la llave para arrancar, oyes un sonido inusual</p></td>
				<td><p><b><center>AVERIAS FRECUENTES:</center></b></p><p>Al coche le cuesta arrancar, sobre todo por las mañanas y en invierno</p><p>Se enciende un testigo en el salpicadero</p><p>Las luces tienen menos potencia. </p></td>
		</table>
	</body>
</html>