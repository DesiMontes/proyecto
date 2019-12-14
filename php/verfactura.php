<?php
$conexion = mysqli_connect('localhost', 'root', '', 'taller')or die('No se pudo conectar: ' . mysqli_error());
					mysqli_set_charset($conexion, "utf8");
              
	$con3="select a.nombre,a.precio from facturas f,pedidos p, articulos a where a.cod_articulos=p.codigo_articulo and p.codigo_factura=f.numero_localizador and f.numero_localizador='1420411'";     
					 $resultado7= mysqli_query($conexion, $con3) or die('consulta fallida: '. mysqli_error($conexion));
		
					while($fi7 = mysqli_fetch_row($resultado7)){
						$nombre=$fi7[0];
						$precio=$fi7[1];
						echo '<table>';
			echo '<td>$nombre</td>';
			echo '<td>$precio €</td>';
		
		
		
		echo '</table>';

					}
?>