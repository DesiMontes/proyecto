<?php
session_unset();
session_start();
		if(isset($_GET["salir"])){
            session_destroy();
            header("Location: index.php");
		}
		if(isset($_SESSION["usuario"])){
			echo "<p class ='usu2'> <b>BIENVENID@: </b>".$_SESSION['usuario']."<br><a href='?salir=salir'>Cerrar session</a></p>";
		
		/*tenemos un campo nivel en vuestra base de datos que indica si el usuario es clinete o administrador
		y de esta manera al acceder el usuario va a hacer una cosa o otra.*/
		if(isset($_SESSION["usuario"])){
			if($_SESSION['nivel'] == "administrador"){ 
				echo '<nav>';
					echo'<li><a href = "paginas/vercitas.php" >VER CITAS</a></li>';
				echo '</nav>';
			}
			else {
			}
		}
		}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="estilos/index.css"/> 
		<meta charset="UTF-8">
		<img class="nombre" src="nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="logo_1.png" alt="imagen-logo" width="200px" height="150px" >
		
	</head>
	<body>
		<div class='alineado'>
			<div class ='menu'>
				<nav>
					<ul>          
						<li><a href="#">Servicios  <img src="./img/logoservicios.png" width="30px" height="40px"></a>
							<ul>
								<li><a href="./php/ruedas.php">Ruedas <img src="./img/rueda1.png" width="30px" height="40px"></a></li>
								<li><a href="./php/aire.php">Aire acondicionado <img src="./img/aire.png" width="30px" height="30px"></a></li>
								<li><a href="./php/mecanica.php">Mecanica y Electricidad <img src="./img/mecanica.png" width="30px" height="30px"></a></li>
								<li><a href="./php/revisiones.php">Revisiones <img src="./img/revision.png" width="25px" height="30px"></a></li>
								<li><a href="./php/aceite.php">Cambio de Aceite <img src="./img/aceite.png" width="70px" height="40px"></a></li>
							</ul>
						</li>
						<li><a href="php/shop.php">Tienda Online <img src="./img/carrito.png" width="70px" height="40px"></a></li>
						<li><a href="php/citaPrevia.php">Pedir Cita <img src="./img/calendario.png" width="30px" height="30px"></a></li>
						<li><a href="php/contacto.php">Contacto <img src="./img/contacto.png" width="30px" height="40px"></a></li>
					</ul>
				</nav>
			</div>
			<img class ='imgtaller'src='img/taller1.jpg'>
			<div class="ele">
				<img  class="ele2" src="./img/elevador.png" width="200px" height="200px" >	
			</div>	
		</div>
		<table class='login2'>
			<td>
				<img class="motor" src="./img/motor.png" ></td>
				<?php 
				if(isset($_SESSION["usuario"])){
				}else{
					echo '	
						<td>
							<a href="php/login.php">
							<img class="login4"src="./img/login.png" >
						</td>
						<td>
							<a href="./php/registro.php">
							<img class="reg1" src ="./img/reg.png" >
						</td>';
				?>
				<td>
					<img class="vo" src="./img/volante.png" >
				</td>
				<tr>
				<td>
				</td>
				<?php
				echo '<td><img class="login3" src="./img/login2.png" ></a></td>
				<td><img class="reg2" src="./img/regi.png"></a></td>';
				}
				?>
		</table>
	</body>
</html>