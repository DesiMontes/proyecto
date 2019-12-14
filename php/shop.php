<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/shop.css"/>
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
			$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
			mysqli_set_charset($conexion, "utf8");	
			$consulta = "select cod_articulos,nombre,precio,foto from articulos";
			$res = mysqli_query($conexion, $consulta) or die ('Consulta fallida');
		?>
		<h2>MontesAuto Shop <img class="carrito" src="../img/carrito.png" alt="imagen-logo" width="70px" height="60px" ></h2>			
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" ></img>			
	</head>	
	<body>
		<li><a href="../index.php">inicio</a>		
		<table id="example"  style="width:95%">
			<tr>				
				<?php	
				//error_reporting(0);	
				$cont=1;
				while ($f = mysqli_fetch_array($res)) {		
					$codigo=$f[0];
					$nombre=$f[1];
					$precio=$f[2];
					$foto=$f[3];	
					if ($cont <= 4) {		
				?>	
					<form action='#' method='post'>
						<td>
							<center>
								<img class='imagenes' src="<?php echo $foto; ?>"/>
							</center>
							<center><p><?php echo $nombre; ?></p></center>
							<h3 class="titulos"><center><?php echo $f['precio'];?><span>€</span></h3></center>
							<center><p>
							</p></center>
							<center>
							<?php echo "<b><a href='../php/shop.php?codigo=$codigo'>Añadir al carrito</a> "?> 
							<img class='botoncarrito' src='../img/shop/botoncarrito.png'>
							</center>											
						</td>
					</form>
					<?php
						$cont++;
					}else{
					?>
						<form action='#' method='post'>
								</tr>
								<tr>
									<td>	
									<center><img class='imagenes' src="<?php echo $foto; ?>"/></center>
									<center><p><?php echo $nombre; ?></p></center>
									<h3 class="titulos"><center><?php echo $f['precio'];?><span>€</span></h3></center>
									<center><p>
							</p></center>
							<center>
								<?php echo "<b><a name ='pasar' href='../php/shop.php?codigo=$codigo'>Añadir al carrito</a> "?>
								<?php
									if(isset($_REQUEST['anadir'])){	
										if(isset($_SESSION["usuario"])){	
										}
									}
								?>
								</center>
								<img class='botoncarrito' src='../img/shop/botoncarrito.png'>
								</td>
						</form>
						
					<?php
							$cont=1;
							$cont++;
				}	
				}										
		if(isset($codigo)){
			if(isset($_SESSION["usuario"])){		
				@$cod = $_REQUEST['codigo'];	
				unset($cod);
				@$cod = $_REQUEST['codigo'];	
				$dniusu=$_SESSION['dni'];	
					 $insercion = "insert into carrito (cod_articulo,id_cliente,cantidad) values ('$cod','$dniusu',1) ";
                $resultado= mysqli_query($conexion, $insercion) or die();
				echo '<center><h4 style="color:green";>Se ha añadido correctamente</h4></center>';	
				echo '<center><h5><a href="../php/carrito.php">Ir al carrito</a></h5></center>';			
			}else{
						echo '<center><h3 class="nologin">Para comprar hay que ser cliente <a href="login.php">Pulse aqui</a> para acceder o registrarse</h3></center>';	
						}								
		}else{}	
					?>						
					</table>					
</body>
</html>
