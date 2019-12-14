
<html>
	<head>
	
		
		
		<link rel="stylesheet" type="text/css" media="screen" href="../estilos/factura.css"/> 
		<meta charset="UTF-8">
		<img class="nombre" src="../nombre.png" alt="imagen-nombre" width="550px" height="100px">
		<img class="logo" src="../logo_1.png" alt="imagen-logo" width="200px" height="150px" >
		<?php
	
	session_start();
	$nombre=$_SESSION["usuario"];
					$dniusu=$_SESSION['dni'];
echo "<p class ='usu2'><a><b> Bienvenid@: $nombre</b></a><br><a href='?salir=salir'>Cerrar session</a></p>";					
if(isset($_GET["salir"])){
            session_destroy();
            header("Location: shop.php");
		}
		
		?>
	</head>

	<body>
	<div id="divToPrint">

	<center><h1>PEDIDO</h1><center>

	
	


	
	
	
<?php	
		
		$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
					mysqli_set_charset($conexion, "utf8");
		 if(isset($_SESSION["usuario"])){
			
			$con1="select codigo_factura from pedidos";     
					 $resultado2= mysqli_query($conexion, $con1) or die('consulta fallida: '. mysqli_error($conexion));
		
			while($fi = mysqli_fetch_row($resultado2)){
				$localizador=$fi[0];
			$_SESSION['localizador']=$localizador;
					
			
			
			}
			
				 echo '<h1>NUMERO DE LOCALIZADOR: <b>'.$localizador.'</b></h1>';

			
			
					
						
               $con="select a.nombre,a.foto,a.precio,p.codigo_factura from articulos a, pedidos p where a.cod_articulos=p.codigo_articulo and p.codigo_cliente='$dniusu' and codigo_factura='$localizador' ";     
					 $resultado0= mysqli_query($conexion, $con) or die('consulta fallida: '. mysqli_error($conexion));
		
                    
					
					$consulta1 = "select SUM(a.precio) from carrito c,articulos a where c.cod_articulo=a.cod_articulos and c.id_cliente = '$dniusu'";
                $resultado1= mysqli_query($conexion, $consulta1) or die('Inserción fallida: '. mysqli_error($conexion));
					$fila1 = mysqli_fetch_array($resultado1) ;
					$consulta5 = "select c.id_cliente,a.nombre,a.precio,c.cantidad from carrito c, articulos a where c.cod_articulo=a.cod_articulos and c.id_cliente = '$dniusu'";
					 $resultado5= mysqli_query($conexion, $consulta5) or die('consulta fallida: '. mysqli_error($conexion));
					 
					 
			echo '<table>';
			
				echo '<th>NOMBRE</th><th>FOTO</th><th>PRECIO</th><tr>';
				$total=$fila1[0];
					$tot=intval($total*100);
					$tot=$tot/100;
					number_format($tot, 2, ",", "."); 
					
				while($fila = mysqli_fetch_row($resultado0)){
				
				$nombre=$fila[0];
				$foto=$fila[1];
				$precio=$fila[2];
				
				echo '<tr>';
				echo '<td>'.$nombre.'</td>';
				echo '<td><center><img src ='.$foto.' width="15%" ></center></td>';
				echo '<td>'.$precio.'</td></tr>';
				
				
					
				}
				
				}	
				
				echo '</table>';	 
					 
		 
		echo '<h1>FACTURAS</h1>';
	 $con2="select distinct codigo_factura from pedidos";     
					 $resultado6= mysqli_query($conexion, $con2) or die('consulta fallida: '. mysqli_error($conexion));
		
			while($fi6 = mysqli_fetch_row($resultado6)){
				$loc=$fi6[0];
				
				$_SESSION['codigo']=$fi6[0];
		
		 
			}
			echo '<table>';
			echo "<td>Ver Facturas<center><a href='../php/factura.php'>Ver factura</a></center></td>";
		
		
		
		echo '</table>';
	?>
	</div>
	
	

</div>
	</body>
	
	
	</html>