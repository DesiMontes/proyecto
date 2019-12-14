<html>

<head>
<link rel="stylesheet" type="text/css" media="screen" href="../estilos/carrito.css"/>

<?php
$num=20;
	for($i=0;$i<=$num;$i++){
	$localizador=rand(1,2000000);
	}

session_start();
if(isset($_GET["salir"])){
            session_destroy();
            header("Location: shop.php");
		}
		if(isset($_SESSION["usuario"])){
			
                    $nombre=$_SESSION["usuario"];
                    echo "<p class ='usu2'><a><b> Bienvenid@: $nombre</b></a><br><a href='?salir=salir'>Cerrar session</a></p>";
					?>
<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" ></img>
<a class='compra' href ='../php/shop.php'>Seguir comprando</a><br>
<form action='#'>
<input class ='vaciar' type='submit' name='vaciar' value='VACIAR CARRITO'><br>
</form>
<?php




$dni=$_SESSION['dni'];
$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
					mysqli_set_charset($conexion, "utf8");




	


			if(isset($_REQUEST['vaciar'])){
	
			$eliminar = "delete from carrito where id_cliente= '$dni'";
                $resultado2= mysqli_query($conexion, $eliminar) or die('eliminacion fallida: '. mysqli_error($conexion));
				echo '<h3>No hay ningun articulo en tu carrito</h3>';
			}else{
		

	
	
		
					$con=0;
					echo '<center><h1>TU PEDIDO:</h1></center>';
						
//$insert = "insert into carrito (cod_articulo,id_cliente,nombre,foto,precio) value ('$codigo','$_SESSION['dni']','$nombre','$foto','$precio')";
					
				 $consulta = "select c.id_cliente,a.nombre,a.foto,a.precio,c.cantidad,c.cod_articulo from carrito c,articulos a where c.cod_articulo=a.cod_articulos and c.id_cliente = '$dni'";
                $resultado5= mysqli_query($conexion, $consulta) or die('Inserción fallida: '. mysqli_error($conexion));	
				
				
				
				
				$consulta1 = "select SUM(a.precio) from carrito c,articulos a where c.cod_articulo=a.cod_articulos and c.id_cliente = '$dni'";
                $resultado1= mysqli_query($conexion, $consulta1) or die('Inserción fallida: '. mysqli_error($conexion));
				
					echo "<center><table>";
						
						
					while ($f = mysqli_fetch_array($resultado5)) {
							
						$idcliente=$f[0];
						$nom=$f[1];
						$foto=$f[2];
						$precio=$f[3];
						$can=$f[4];
						$cod=$f[5];
						
						echo "<td>$idcliente</td>";
						echo "<td>$nom</td>";
						echo "<td><img src='$foto' width='110em' height='80em'></img></td>";
						echo "<td>$can</td>";
						echo "<td>$precio</td>
						<td>
						
							<a href='?codigo=$cod' >ELIMINAR ARTICULO</a>  
</td>
						
						
						<tr>";
						
						
						
	$insertar = "INSERT INTO pedidos (codigo_cliente,codigo_factura,codigo_articulo) value ('$dni','$localizador',$cod)";
	$resultado2= mysqli_query($conexion, $insertar) or die('Inserción fallida: '. mysqli_error($conexion));
	
	
	
	$eliminar2 = "delete from carrito where id_cliente= '$dni'and cod_articulo= '$cod'";
                $resultado3= mysqli_query($conexion, $eliminar2) or die('eliminacion fallida: '. mysqli_error($conexion));
	







	
				
					}
					

	
if(isset($_REQUEST['factura'])){
echo '<h1>Muchas gracias por la compra tu numero de pedido es: <b>'.$localizador.'</b></h1>';

echo '<br><a href="../php/pedido.php">ver mis pedidos</a>';		
}			
					if(!empty ($cod)){
						
					
						if(isset($_GET['codigo'])){
						$cod=$_REQUEST['codigo'];
	$eliminar2 = "delete from carrito where id_cliente= '$dni'and cod_articulo= '$cod'";
                $resultado3= mysqli_query($conexion, $eliminar2) or die('eliminacion fallida: '. mysqli_error($conexion));
					}
				echo "<td><b>TOTAL:</b></td><td></td><td></td><td></td>";
			$fila = mysqli_fetch_array($resultado1) ;
					
					$total=$fila[0];
					$tot=intval($total*100);
					$tot=$tot/100;
					number_format($tot, 2, ",", "."); 
					echo "<td>$tot €</td>";
				
				

				echo "</table></center>";
				echo "<form action='#' method='post'> 
			<input class ='fin' type='submit' name='factura' value='Finaliza Tu Compra'>
			</form>";
					}else{
						echo '<h4>No hay ningun articulo</h4>';
					}
					
}


	


	
	
}
		
?>
</head>
<body>



</body>
</html>